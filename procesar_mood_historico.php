<?php
// Incluir archivo de funciones de base de datos
include 'models/core.php';

$error = '';
$datosHistorial = [];

// Verificar que el formulario se haya enviado correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaInicio = $_POST['fechaInicio'] ?? '';
    $fechaFin = $_POST['fechaFin'] ?? '';

    // Validar que las fechas no estén vacías y sean válidas
    if (empty($fechaInicio) || empty($fechaFin)) {
        $error = "Por favor, selecciona ambas fechas.";
    } else if ($fechaInicio > $fechaFin) {
        $error = "La fecha de inicio no puede ser posterior a la fecha de fin.";
    } else {
        // Llamar a la función que obtiene el historial de estados de ánimo por rango de fechas
        $datosHistorial = obtenerHistorialEstadosAnimoPorFecha($fechaInicio, $fechaFin);

        // Si no hay datos para el historial, mostrar un mensaje
        if (empty($datosHistorial)) {
            $error = "No hay historial de estados de ánimo para el rango de fechas seleccionado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Estados de Ánimo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        p.error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Historial de Estados de Ánimo</h2>

    <!-- Mostrar el error si existe -->
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <!-- Mostrar el historial en una tabla si hay datos -->
    <?php if (!empty($datosHistorial)): ?>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <?php foreach ($datosHistorial as $registro): ?>
                        <th><?php echo htmlspecialchars($registro['fecha']); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Estado de Ánimo</td>
                    <?php foreach ($datosHistorial as $registro): ?>
                        <td><?php echo htmlspecialchars($registro['estado_animo']); ?></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Enlace para volver al inicio -->
    <a href="dashboard.php">Volver al inicio</a>
</body>
</html>
