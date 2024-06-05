<?php
include 'core.php';

$error = '';
$chartData = [];
$chartLabels = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaInicio = $_POST['fechaInicio'] ?? '';
    $fechaFin = $_POST['fechaFin'] ?? '';

    if (empty($fechaInicio) || empty($fechaFin)) {
        $error = "Por favor, selecciona ambas fechas.";
    } else if ($fechaInicio > $fechaFin) {
        $error = "La fecha de inicio no puede ser posterior a la fecha de fin.";
    } else {
        $datos = obtenerHistorialEstadosAnimoPorFecha($fechaInicio, $fechaFin);

        if ($datos !== null && !empty($datos)) {
            $contadorEstados = [];
            foreach ($datos as $fila) {
                if (isset($fila['estado_animo'])) {
                    $estadoAnimo = $fila['estado_animo'];
                    if (!isset($contadorEstados[$estadoAnimo])) {
                        $contadorEstados[$estadoAnimo] = 0;
                    }
                    $contadorEstados[$estadoAnimo]++;
                } else {
                    error_log("La clave 'estado_animo' no está definida en: " . print_r($fila, true));
                }
            }

            foreach ($contadorEstados as $estado => $cantidad) {
                $chartLabels[] = $estado;
                $chartData[] = $cantidad;
            }
        } else {
            $error = "No hay historial para el rango de fechas seleccionado.";
        }
    }
}

header('Content-Type: application/json');
echo json_encode([
    'error' => $error,
    'labels' => $chartLabels,
    'data' => $chartData
]);
