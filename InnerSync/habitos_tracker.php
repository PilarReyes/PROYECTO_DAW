<?php
include 'conexion.php';
include "funcion_habitos.php";

// Verificar si se ha enviado una solicitud para ver un mes específico
if (isset($_GET['mes'])) {
    $mes_seleccionado = $_GET['mes'];
} else {
    // Si no se especifica un mes, mostrar el mes actual por defecto
    $mes_seleccionado = date('Y-m');
}

// Obtener los hábitos del usuario
$habitos_usuario = obtenerHabitosDelUsuario();

// Función para obtener el historial de hábitos completados para un mes específico
function obtenerHistorialHabitos($conexion, $mes) {
    $historial_habitos = [];

    // Consultar la base de datos para obtener el historial de hábitos completados para el mes seleccionado
    $consulta = "SELECT fecha, id_habito FROM historicohabitos WHERE MONTH(fecha) = MONTH(?) AND YEAR(fecha) = YEAR(?)";
    $stmt = $conexion->prepare($consulta);
    if ($stmt) {
        $stmt->bind_param("ss", $mes, $mes);
        $stmt->execute();
        $result = $stmt->get_result();

        // Organizar los datos en un array asociativo con el formato [fecha => [id_habito1 => completado, id_habito2 => completado, ...]]
        while ($row = $result->fetch_assoc()) {
            $fecha = $row['fecha'];
            $id_habito = $row['id_habito'];
            $historial_habitos[$fecha][$id_habito] = true; // Marcar el hábito como completado para esta fecha
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }

    return $historial_habitos;
}

// Obtener el historial de hábitos para el mes seleccionado
$historial_habitos = obtenerHistorialHabitos($conexion, $mes_seleccionado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Hábitos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Historial de Hábitos - Mes <?php echo date('F Y', strtotime($mes_seleccionado)); ?></h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <?php foreach ($habitos_usuario as $habito) : ?>
                    <th><?php echo $habito['nombre']; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historial_habitos as $fecha => $habitos_completados) : ?>
                <tr>
                    <td><?php echo date('Y-m-d', strtotime($fecha)); ?></td>
                    <?php foreach ($habitos_usuario as $habito) : ?>
                        <td><?php echo isset($habitos_completados[$habito['id']]) ? 'Sí' : 'No'; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
