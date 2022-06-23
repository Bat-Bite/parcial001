<?php
function UnirTodo($u1, $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10, $v11, $v12, $v13, $v14, $v15, $directorioActual)
{
    $nombreArchivoFinal = $directorioActual . '/data/perifericos/03_archivo_final.csv';
    $archivoFinal = fopen($nombreArchivoFinal, 'w+b') or die("error archivo final 04");

    $nombreArchivo1 = $directorioActual . '/data/perifericos/02_' . $v1[0] . '.csv';
    $nombreArchivo2 = $directorioActual . '/data/perifericos/02_' . $v2[0] . '.csv';
    $nombreArchivo3 = $directorioActual . '/data/perifericos/02_' . $v3[0] . '.csv';
    $nombreArchivo4 = $directorioActual . '/data/perifericos/02_' . $v4[0] . '.csv';
    $nombreArchivo5 = $directorioActual . '/data/perifericos/02_' . $v5[0] . '.csv';
    $nombreArchivo6 = $directorioActual . '/data/perifericos/02_' . $v6[0] . '.csv';
    $nombreArchivo7 = $directorioActual . '/data/perifericos/02_' . $v7[0] . '.csv';
    $nombreArchivo8 = $directorioActual . '/data/perifericos/02_' . $v8[0] . '.csv';
    $nombreArchivo9 = $directorioActual . '/data/perifericos/02_' . $v9[0] . '.csv';
    $nombreArchivo10 = $directorioActual . '/data/perifericos/02_' . $v10[0] . '.csv';
    $nombreArchivo11 = $directorioActual . '/data/perifericos/02_' . $v11[0] . '.csv';
    $nombreArchivo12 = $directorioActual . '/data/perifericos/02_' . $v12[0] . '.csv';
    $nombreArchivo13 = $directorioActual . '/data/perifericos/02_' . $v13[0] . '.csv';
    $nombreArchivo14 = $directorioActual . '/data/perifericos/02_' . $v14[0] . '.csv';
    $nombreArchivo15 = $directorioActual . '/data/perifericos/02_' . $v15[0] . '.csv';

    $arrayTemp1 = file($nombreArchivo1);
    foreach ($arrayTemp1 as $datos) $arrayTemp1 = explode(",", $datos);unset($datos);
    $arrayTemp2 = file($nombreArchivo2);
    foreach ($arrayTemp2 as $datos) $arrayTemp2 = explode(",", $datos);unset($datos);
    $arrayTemp3 = file($nombreArchivo3);
    foreach ($arrayTemp3 as $datos) $arrayTemp3 = explode(",", $datos);unset($datos);
    $arrayTemp4 = file($nombreArchivo4);
    foreach ($arrayTemp4 as $datos) $arrayTemp4 = explode(",", $datos);unset($datos);
    $arrayTemp5 = file($nombreArchivo5);
    foreach ($arrayTemp5 as $datos) $arrayTemp5 = explode(",", $datos);unset($datos);
    $arrayTemp6 = file($nombreArchivo6);
    foreach ($arrayTemp6 as $datos) $arrayTemp6 = explode(",", $datos);unset($datos);
    $arrayTemp7 = file($nombreArchivo7);
    foreach ($arrayTemp7 as $datos) $arrayTemp7 = explode(",", $datos);unset($datos);
    $arrayTemp8 = file($nombreArchivo8);
    foreach ($arrayTemp8 as $datos) $arrayTemp8 = explode(",", $datos);unset($datos);
    $arrayTemp9 = file($nombreArchivo9);
    foreach ($arrayTemp9 as $datos) $arrayTemp9 = explode(",", $datos);unset($datos);
    $arrayTemp10 = file($nombreArchivo10);
    foreach ($arrayTemp10 as $datos) $arrayTemp10 = explode(",", $datos);unset($datos);
    $arrayTemp11 = file($nombreArchivo11);
    foreach ($arrayTemp11 as $datos) $arrayTemp11 = explode(",", $datos);unset($datos);
    $arrayTemp12 = file($nombreArchivo12);
    foreach ($arrayTemp12 as $datos) $arrayTemp12 = explode(",", $datos);unset($datos);
    $arrayTemp13 = file($nombreArchivo13);
    foreach ($arrayTemp13 as $datos) $arrayTemp13 = explode(",", $datos);unset($datos);
    $arrayTemp14 = file($nombreArchivo14);
    foreach ($arrayTemp14 as $datos) $arrayTemp14 = explode(",", $datos);unset($datos);
    $arrayTemp15 = file($nombreArchivo15);
    foreach ($arrayTemp15 as $datos) $arrayTemp15 = explode(",", $datos);unset($datos);

    //ver manera de simplificar el order de cadena o automatizar con el orden original
    for ($i = 0; $i < count($v1); $i++) {
        $cadena = $u1[$i] . "," . $arrayTemp1[$i] . "," . $arrayTemp2[$i] . "," . $arrayTemp3[$i] . "," . $arrayTemp4[$i] . "," . $arrayTemp5[$i] . "," . $arrayTemp6[$i] . "," . $arrayTemp7[$i] . "," . $arrayTemp8[$i] . "," . $arrayTemp9[$i] . "," . $arrayTemp10[$i] . "," . $arrayTemp11[$i] . "," . $arrayTemp12[$i] . "," . $arrayTemp13[$i] . "," . $arrayTemp14[$i] . "," . $arrayTemp15[$i];
        if ($i < count($v1) - 1) {
            fwrite($archivoFinal, $cadena . "\n");
        } else {
            fwrite($archivoFinal, $cadena);
        }
    }
    fclose($archivoFinal);

    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = str_replace(",", "|", $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);
    unset($archivo);

    rename($nombreArchivoFinal, $directorioActual . '/data/r_barrio_populares.dat');
    $ubicacion = $directorioActual . '/data/r_barrio_populares.dat';
    echo '
    <p>Descargar: <a href=' . $ubicacion . '>' . $ubicacion . '</a></p>
    ';
}
