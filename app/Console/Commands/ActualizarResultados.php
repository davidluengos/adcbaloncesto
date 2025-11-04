<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Partido;
use DOMDocument;
use DOMXPath;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ActualizarResultados extends Command
{
    protected $signature = 'partido:actualizar-resultados';
    protected $description = 'Obtiene los resultados de la jornada desde FEXB y actualiza los partidos en la BD';

    public function handle()
    {
        $logPath = storage_path('logs/resultados.log');
        Log::channel('resultados')->info("🕒 [INICIO] Actualización de resultados - " . now());

        $url = 'https://www.fexb.es/competicion-82/comp-nacionales.aspx';

        try {
            $html = file_get_contents($url);
        } catch (\Exception $e) {
            Log::channel('resultados')->error("❌ Error al obtener la URL: " . $e->getMessage());
            $this->error('No se pudo acceder a la web de resultados.');
            return 1;
        }

        $dom = new DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        $xpath = new DOMXPath($dom);

        $filas = $xpath->query('//h4[contains(., "Resultados de la jornada")]/following-sibling::div//table/tbody/tr');

        if ($filas->length === 0) {
            $msg = 'No se encontraron resultados en la página.';
            $this->warn($msg);
            Log::channel('resultados')->warning($msg);
            return 0;
        }

        $resultados = [];
        foreach ($filas as $fila) {
            $celdas = $fila->getElementsByTagName('td');
            if ($celdas->length < 5) continue;

            $fecha = $this->decodeFromScript($celdas->item(0)->C14N());
            $puntos_local = $this->decodeFromScript($celdas->item(1)->C14N());
            $local = $this->decodeFromScript($celdas->item(2)->C14N());
            $visitante = $this->decodeFromScript($celdas->item(3)->C14N());
            $puntos_visitante = $this->decodeFromScript($celdas->item(4)->C14N());

            $resultados[] = [
                'fecha' => trim($fecha),
                'local' => strtoupper(trim($local)),
                'visitante' => strtoupper(trim($visitante)),
                'puntos_local' => is_numeric($puntos_local) ? (int)$puntos_local : null,
                'puntos_visitante' => is_numeric($puntos_visitante) ? (int)$puntos_visitante : null,
            ];
        }

        $miEquipo = 'ESCAYOLAS PACO ADC BALONCESTO';
        $miEquipoId = 1;

        foreach ($resultados as $r) {
            $fechaStr = trim($r['fecha']);

            // Decodificar y validar fecha
            $fechaStr = preg_replace_callback('/&#(\d+);/', fn($m) => chr((int)$m[1]), $fechaStr);
            $fechaStr = html_entity_decode($fechaStr, ENT_QUOTES | ENT_HTML5, 'UTF-8');

            if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $fechaStr)) {
                $msg = "⚠️ Fecha no válida o sin decodificar: {$fechaStr}";
                $this->warn($msg);
                Log::channel('resultados')->warning($msg);
                continue;
            }

            $fecha = Carbon::createFromFormat('d/m/Y', $fechaStr)->format('Y-m-d');
            $local = $r['local'];
            $visitante = $r['visitante'];
            $pl = $r['puntos_local'];
            $pv = $r['puntos_visitante'];

            if ($local !== $miEquipo && $visitante !== $miEquipo) {
                continue;
            }

            $partido = Partido::whereDate('fecha', $fecha)
                ->where(function ($q) use ($miEquipoId) {
                    $q->where('equipo_local_id', $miEquipoId)
                        ->orWhere('equipo_visitante_id', $miEquipoId);
                })
                ->first();

            if (!$partido) {
                $msg = "⚠️ Partido no encontrado ({$fecha}) para {$miEquipo}";
                $this->warn($msg);
                Log::channel('resultados')->warning($msg);
                continue;
            }

            // ⏸️ Si el partido ya tiene resultado, no lo actualizamos
            if (!is_null($partido->resultado_local) && !is_null($partido->resultado_visitante)) {
                $msg = "⚠️ Partido ya tenía resultado: {$partido->resultado_local}-{$partido->resultado_visitante} ({$fecha})";
                $this->line($msg);
                Log::channel('resultados')->info($msg);
                continue;
            }

            // Actualización de resultado
            if ($local === $miEquipo) {
                $partido->resultado_local = $pl;
                $partido->resultado_visitante = $pv;
            } else {
                $partido->resultado_local = $pv;
                $partido->resultado_visitante = $pl;
            }

            $partido->save();

            $msg = "✅ {$fecha} | {$local} {$pl} - {$pv} {$visitante}";
            $this->info($msg);
            $msg = mb_convert_encoding($msg, 'UTF-8', 'UTF-8');
            Log::channel('resultados')->info($msg);
        }

        Log::channel('resultados')->info("🏁 [FIN] Actualización completada - " . now());
        Log::channel('resultados')->info("----------------------------------------");
        $this->info("Proceso completado. Ver log en: {$logPath}");

        return 0;
    }



    /**
     * Extrae y decodifica el contenido del <script>decodificar("...")</script>
     */
    private function decodeFromScript($html)
    {
        if (!$html) return '';

        // 1️⃣ Extraer contenido dentro de decodificar("...")
        if (preg_match('/decodificar\("([^"]+)"\)/', $html, $matches)) {
            $encoded = $matches[1];
        } else {
            $encoded = $html;
        }

        // 2️⃣ Decodificar entidades HTML numéricas y normales
        $decoded = html_entity_decode($encoded, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // 3️⃣ Por si quedan entidades numéricas sin procesar (ej. &#48;)
        $decoded = preg_replace_callback(
            '/&#(\d+);/',
            fn($m) => chr((int)$m[1]),
            $decoded
        );

        // 4️⃣ Limpiar etiquetas si hubiera
        return trim(strip_tags($decoded));
    }
}
