<?php 

namespace App\Helpers;

use DOMDocument;

class Clasificacion
{

    public static function obtener_clasificacion() {
        // URL de la página a scrapear
        $url = 'https://www.feb.es/Pasarela/Controles/clasificacion.aspx?g=67';

        // Obtener el contenido HTML de la página
        $html = file_get_contents($url);

        // Crear un objeto DOMDocument y cargar el HTML
        $dom = new DOMDocument();
        //@$dom->loadHTML($html);
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        // Encontrar la tabla de clasificación
        $tabla = $dom->getElementsByTagName('table')->item(0);

        // Array para almacenar los resultados
        $resultados = array();

        // Recorrer las filas de la tabla
        foreach ($tabla->getElementsByTagName('tr') as $fila) {
            // Ignorar las filas de cabecera
            if ($fila->getAttribute('class') != 'header') {
                // Array para almacenar los datos de cada equipo
                $equipo = array();

                // Recorrer las celdas de la fila
                foreach ($fila->getElementsByTagName('td') as $indice => $celda) {
            // Añadir el contenido de la celda al array de datos del equipo
                    switch ($indice) {
                        case 0:
                            $equipo['posicion'] = trim($celda->nodeValue);
                            break;
                        case 1:
                            $equipo['EQUIPO'] = trim($celda->nodeValue);
                            break;
                        case 2:
                            $equipo['PJ'] = trim($celda->nodeValue);
                            break;
                        case 3:
                            $equipo['PG'] = trim($celda->nodeValue);
                            break;
                        case 4:
                            $equipo['PP'] = trim($celda->nodeValue);
                            break;
                        case 5:
                            $equipo['PF'] = trim($celda->nodeValue);
                            break;
                        case 6:
                            $equipo['PC'] = trim($celda->nodeValue);
                            break;
                        case 7:
                            $equipo['PTS'] = trim($celda->nodeValue);
                            break;
                    }
                }

                // Añadir el array de datos del equipo al array de resultados
                $resultados[] = $equipo;
            }
        }

        // Devolver los resultados en formato JSON
        return $resultados;
    }
}