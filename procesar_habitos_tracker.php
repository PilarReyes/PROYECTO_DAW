<?php
// Incluir archivo de funciones de base de datos
include 'models/core.php';

$error = '';
$datosAgrupados = [];
$dias = [];

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
        // Llamar a la función que obtiene el historial por rango de fechas
        $datos = obtenerHistorialHabitosPorFecha($fechaInicio, $fechaFin);

        // Si hay datos, agrupar por hábito
        if ($datos !== null && !empty($datos)) {
            foreach ($datos as $fila) {
                $fecha = $fila['fecha'];
                $nombreHabito = $fila['nombre'];

                // Mantener un conjunto de todas las fechas
                if (!in_array($fecha, $dias)) {
                    $dias[] = $fecha;
                }

                // Agrupar por hábito
                if (!isset($datosAgrupados[$nombreHabito])) {
                    $datosAgrupados[$nombreHabito] = [];
                }

                // Añadir la fecha si el hábito se ha cumplido
                $datosAgrupados[$nombreHabito][$fecha] = '✔'; // Símbolo de cumplido
            }

            // Ordenar los días
            sort($dias);
        } else {
            $error = "No hay historial para el rango de fechas seleccionado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Hábitos</title>
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
    <h2>Historial de Hábitos</h2>

    <!-- Mostrar el error si existe -->
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <!-- Mostrar el historial en una tabla si hay datos -->
    <?php if (!empty($datosAgrupados) && !empty($dias)): ?>
        <table>
            <thead>
                <tr>
                    <th>Hábito</th>
                    <?php foreach ($dias as $dia): ?>
                        <th><?php echo htmlspecialchars($dia); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosAgrupados as $habito => $cumplido): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($habito); ?></td>
                        <?php foreach ($dias as $dia): ?>
                            <td><?php echo isset($cumplido[$dia]) ? $cumplido[$dia] : ''; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <br>


</body>
</html>

<a href="dashboard.php">Volver al inicio</a>