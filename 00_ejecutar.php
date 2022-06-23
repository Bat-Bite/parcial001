<?php
require __DIR__ . '/vistas/01_header.php';
require __DIR__ . '/vistas/02_footer.php';
require __DIR__ . '/shells/01_regularizar.php';
require __DIR__ . '/shells/02_datos_array.php';
require __DIR__ . '/shells/03_remplazar.php';
require __DIR__ . '/shells/04_unir_todo.php';
require __DIR__ . '/shells/05_unir_indices.php';

echo $htmlInicio;

$directorioActual = '../' . basename(getcwd());

$nombreArchivoOriginal = $directorioActual . '/data/Barrio_populares_info_publica.csv';
$nombreArchivoRegularizado = $directorioActual . '/data/r_barrio_populares.csv';

foreach (Regularizar($nombreArchivoOriginal, $nombreArchivoRegularizado) as $datos) list($renabap_id[], $nombre[], $provincia[], $departamento[], $localidad[], $cantidad_familias_aproximada[], $decada_de_creacion[], $anio_de_creacion[], $energia_electrica[], $efluentes_cloacales[], $agua_corriente[], $cocina[], $calefaccion[], $situacion_dominial[], $clasificacion_barrio[], $superficie_m2[]) = explode(",", $datos);unset($datos);

GenerarTablas($nombre, $directorioActual);
GenerarTablas($provincia, $directorioActual);
GenerarTablas($departamento, $directorioActual);
GenerarTablas($localidad, $directorioActual);
GenerarTablas($cantidad_familias_aproximada, $directorioActual);
GenerarTablas($decada_de_creacion, $directorioActual);
GenerarTablas($anio_de_creacion, $directorioActual);
GenerarTablas($energia_electrica, $directorioActual);
GenerarTablas($efluentes_cloacales, $directorioActual);
GenerarTablas($agua_corriente, $directorioActual);
GenerarTablas($cocina, $directorioActual);
GenerarTablas($calefaccion, $directorioActual);
GenerarTablas($situacion_dominial, $directorioActual);
GenerarTablas($clasificacion_barrio, $directorioActual); 
GenerarTablas($superficie_m2, $directorioActual);

//mayor tiempo de carga
Remplazar($nombre, $directorioActual);
Remplazar($provincia, $directorioActual);
Remplazar($departamento, $directorioActual);
Remplazar($localidad, $directorioActual);
Remplazar($cantidad_familias_aproximada, $directorioActual);
Remplazar($decada_de_creacion, $directorioActual);
Remplazar($anio_de_creacion, $directorioActual);
Remplazar($energia_electrica, $directorioActual);
Remplazar($efluentes_cloacales, $directorioActual);
Remplazar($agua_corriente, $directorioActual);
Remplazar($cocina, $directorioActual);
Remplazar($calefaccion, $directorioActual);
Remplazar($situacion_dominial, $directorioActual);
Remplazar($clasificacion_barrio, $directorioActual);
Remplazar($superficie_m2, $directorioActual);

UnirTodo($renabap_id,$nombre,$provincia,$departamento,$localidad,$cantidad_familias_aproximada,$decada_de_creacion,$anio_de_creacion,$energia_electrica,$efluentes_cloacales,$agua_corriente,$cocina,$calefaccion,$situacion_dominial,$clasificacion_barrio,$superficie_m2,$directorioActual);

UnirIndices($nombre, $directorioActual);
UnirIndices($provincia, $directorioActual);
UnirIndices($departamento, $directorioActual);
UnirIndices($cantidad_familias_aproximada, $directorioActual);
UnirIndices($localidad, $directorioActual);
UnirIndices($decada_de_creacion, $directorioActual);
UnirIndices($anio_de_creacion, $directorioActual);
UnirIndices($energia_electrica, $directorioActual);
UnirIndices($efluentes_cloacales, $directorioActual);
UnirIndices($agua_corriente, $directorioActual);
UnirIndices($cocina, $directorioActual);
UnirIndices($calefaccion, $directorioActual);
UnirIndices($situacion_dominial, $directorioActual);
UnirIndices($clasificacion_barrio, $directorioActual);
UnirIndices($superficie_m2, $directorioActual);

echo $htmlFin;