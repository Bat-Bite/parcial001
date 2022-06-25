<?php
function Remplazar($array, $directorioActual)
{

    $nombreArchivo0 = $directorioActual . '/data/perifericos/00_' . $array[0] . '.csv';
    $nombreArchivo1 = $directorioActual . '/data/perifericos/01_' . $array[0] . '.csv';

    $archivoFinal = fopen($directorioActual . '/data/perifericos/02_' . $array[0] . '.csv', 'w+b') or die("error archivo final 3");

    //carga de 00_ y 01_
    $arrayTemp0 = file($nombreArchivo0);
    foreach ($arrayTemp0 as $datos) $arrayTemp0 = explode(",", $datos);unset($datos);
    $arrayTemp1 = file($nombreArchivo1);
    foreach ($arrayTemp1 as $datos) $arrayTemp1 = explode(",", $datos);unset($datos);

    $largoi=count($array);
    $largox=count($arrayTemp0);

    //cargar todos los datos del array y crear 02_
    for ($i = 0; $i < $largoi; $i++) {
        $cadena = $array[$i];
        if ($i < $largoi - 1) {
            $cadena .= ",";
            fwrite($archivoFinal, $cadena);
        } else {
            fwrite($archivoFinal, $cadena);
        }
    }
    fclose($archivoFinal);


    $archivoFinal = fopen($directorioActual . '/data/perifericos/02_' . $array[0] . '.csv', 'w+b') or die("error archivo final 3");

    for ($i = 0; $i < $largoi; $i++) {
        for ($x = 0; $x < $largox; $x++) {
            if ($array[$i] == $arrayTemp0[$x]) {
                $cadena = $arrayTemp1[$x];
                if ($i < $largoi - 1) {
                    fwrite($archivoFinal, $cadena . ",");
                    $i++;
                    $x=0;
                } else {
                    fwrite($archivoFinal, $cadena);
                }
            } 
        }
    }
    fclose($archivoFinal);


    /* genera errores
    $nombreArchivoFinal = $directorioActual . '/data/perifericos/02_' . $array[0] . '.csv';
    $archivo = file_get_contents($nombreArchivoFinal);     
    $archivo = str_replace($arrayTemp0, $arrayTemp1, $archivo);
    file_put_contents($nombreArchivoFinal, $archivo); 
    */
}
