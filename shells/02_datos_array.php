<?php
function GenerarTablas($array, $directorioActual)
{
    $existeCarpeta = $directorioActual . '/data/perifericos';
    if (!file_exists($existeCarpeta)) {
        mkdir($existeCarpeta, 0777, true);
    }
    $array = array_values(array_unique($array));
    $nombreArchivo = $directorioActual . '/data/perifericos/00_' . $array[0] . '.csv';
    $fp = fopen($nombreArchivo, 'w+b') or die("error Devolver Tabla");
    fputcsv($fp, $array);
    fclose($fp);

    $archivo = file_get_contents($nombreArchivo);
    $archivo = str_replace(array("\r\n", "\n", "\r"), "", $archivo);
    file_put_contents($nombreArchivo, $archivo);
    $archivo = file_get_contents($nombreArchivo);
    $archivo = str_replace('"', "", $archivo);
    file_put_contents($nombreArchivo, $archivo);

    //Directorios
    $nombreArchivo1 = $directorioActual . '/data/perifericos/01_' . $array[0] . '.csv';
    $archivo1 = fopen($nombreArchivo1, 'w+b') or die("error remplazar datos");
    //Generar claves
    $id = array_keys($array);
    $nombreId = $array[0];
    //Generar nombre id
    //······························test··············································cambio de 3 a 1 en substr y agregar strtouper
    $nombreId = strtoupper(substr(str_replace(array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "_"), "", $nombreId), 0, 2));
    //Agregar nombre id + array
    for ($i = 0; $i < count($array); $i++) {
        $id[$i] = /* $nombreId .  */$id[$i];
        if ($i < count($array) - 1) {
            if ($i != 0) {
                $cadena = $id[$i] . ",";
                fwrite($archivo1, $cadena);
            } else {
                $cadena = $array[0] . ",";
                fwrite($archivo1, $cadena);
            }
        } else {
            $cadena = $id[$i];
            fwrite($archivo1, $cadena);
        }
    }
    fclose($archivo1);
}
