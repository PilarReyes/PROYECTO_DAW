<?php
include 'core.php';
header('Content-Type: application/json');

// Supongo que las funciones obtenerEventos(), obtenerTareas() y obtenerFechasEspeciales() ya están definidas en core.php
$eventos = obtenerEventos();
$tareas = obtenerTareas();
$fechasEspeciales = obtenerEventosEspeciales();

$data = array_merge($eventos, $tareas, $fechasEspeciales);

// Imprime los datos para verificar si están correctos
error_log(print_r($data, true));

echo json_encode($data);
?>
