<?php
//       Pasar nombre completo del archivo original y el de salida
function Regularizar($nombreArchivo, $nombreArchivoFinal)
{

    $existe = $nombreArchivoFinal;
    if (file_exists($existe)) {
        unlink($nombreArchivoFinal);
    }
    //resetear saltos de linea ok
    $archivo = file_get_contents($nombreArchivo);
    $archivo = str_replace(array("\r\n", "\n", "\r"), "\n", $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //quitar guiones
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = str_replace("-", " ", $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //quitar comas de texto entre comillas ok
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = str_replace(", ", "/", $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //quitar comilas ok
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = str_replace('"', "", $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //agregar basura al archivo final ok 
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = str_replace("\n", ",\n", $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //agregar "sin datos" a contenido intermedio vacio ok
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = str_replace(",,", ",sin datos,", $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //quita los espacios en blanco en exceso de una cadena ok
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = preg_replace('/\s\s+/', ' ', $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //pasar mayusculas a minusculas ok
    $mayusculas = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü');
    $minusculas = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'á', 'é', 'í', 'ó', 'ú', 'ñ', 'ü');
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = str_replace($mayusculas, $minusculas, $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //agregar romanos
    $romanos = array("xx", "iii", "ii", " i,");
    $rRomanos = array("XX", "III", "II", " I,");
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = str_replace($romanos, $rRomanos, $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //quitar .0 
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = preg_replace(array('/\.00+/', '/\.0/'), '', $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    //quitar fechas y hora
    $archivo = file_get_contents($nombreArchivoFinal);
    $archivo = preg_replace('/([0-9 -]+(..:..:..))/', 'sin datos', $archivo);
    file_put_contents($nombreArchivoFinal, $archivo);

    return $archivo = file($nombreArchivoFinal);
}
