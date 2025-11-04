<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class ResultadosLogController extends Controller
{
    public function index()
    {
        $logPath = storage_path('logs/resultados.log');

        if (!File::exists($logPath)) {
            $logs = ["⚠️ No se encontró el archivo resultados.log."];
        } else {
            $content = File::get($logPath);

            // Mostramos las líneas más recientes primero
            $lines = array_reverse(explode("\n", trim($content)));

            // Limitar a las últimas 200 líneas por rendimiento
            $logs = array_slice($lines, 0, 200);
        }

        return view('admin.otros.resultados-log', compact('logs'));
    }
}

