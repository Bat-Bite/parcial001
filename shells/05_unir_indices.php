<?php

function UnirIndices($array, $directorioActual)
{

    $nombreArchivoFinal = $directorioActual . '/data/perifericos/02_' . $array[0] . '.csv';
    if (file_exists($nombreArchivoFinal)) {
        unlink($nombreArchivoFinal);
    }

    $nombreArchivo00 = $directorioActual . '/data/perifericos/00_' . $array[0] . '.csv';
    $nombreArchivo01 = $directorioActual . '/data/perifericos/01_' . $array[0] . '.csv';

    $array0 = file($nombreArchivo00);
    foreach ($array0 as $datos) $array0 = explode(",", $datos);unset($datos);
    $array1 = file($nombreArchivo01);
    foreach ($array1 as $datos) $array1 = explode(",", $datos);unset($datos);

    if (count($array0) == count($array1)) {
        $abir = fopen($nombreArchivoFinal, 'w+b') or die("error archivo final 5");

        for ($i = 0; $i < count($array0); $i++) {
            $cadena = $array1[$i] . '|' . $array0[$i];
            if ($i < count($array0) - 1) {
                fwrite($abir, $cadena . "\n");
            } else {
                fwrite($abir, $cadena);
            }
        }
        fclose($abir);

        rename($nombreArchivoFinal, $directorioActual . '/data/perifericos/02_' . $array[0] . '.dat');
    }
    else{
        echo 'Error fs505';
    }
    //
/*     $aux=array_combine($array1,$array0);
    echo '<pre>';
    print_r($aux);
    echo '</pre>'; */
}
