<?php
// Incluir archivo de funciones de base de datos
include 'core.php';

$error = '';
$datosAgrupados = [];
$dias = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaInicio = $_POST['fechaInicio'] ?? '';
    $fechaFin = $_POST['fechaFin'] ?? '';

    error_log("Fecha Inicio: " . $fechaInicio);
    error_log("Fecha Fin: " . $fechaFin);

    if (empty($fechaInicio) || empty($fechaFin)) {
        $error = "Por favor, selecciona ambas fechas.";
    } else if ($fechaInicio > $fechaFin) {
        $error = "La fecha de inicio no puede ser posterior a la fecha de fin.";
    } else {
        $datos = obtenerHistorialHabitosPorFecha($fechaInicio, $fechaFin);

        error_log("Datos obtenidos: " . print_r($datos, true));

        if ($datos !== null && !empty($datos)) {
            foreach ($datos as $fila) {
                $fecha = $fila['fecha'];
                $nombreHabito = $fila['nombre'];

                if (!in_array($fecha, $dias)) {
                    $dias[] = $fecha;
                }

                if (!isset($datosAgrupados[$nombreHabito])) {
                    $datosAgrupados[$nombreHabito] = [];
                }

                $datosAgrupados[$nombreHabito][$fecha] = '✔'; // Símbolo de cumplido
            }

            sort($dias);
        } else {
            $error = "No hay historial para el rango de fechas seleccionado.";
        }
    }
}

// Generar la respuesta HTML


if (!empty($error)) {
    echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
}

if (!empty($datosAgrupados) && !empty($dias)) {
    echo "<div class='container'>";
    echo "<table>";
    echo "<thead><tr><th>Hábito</th>";
    foreach ($dias as $dia) {
        echo "<th>" . htmlspecialchars($dia) . "</th>";
    }
    echo "</tr></thead><tbody>";
    foreach ($datosAgrupados as $habito => $cumplido) {
        echo "<tr><td>" . htmlspecialchars($habito) . "</td>";
        foreach ($dias as $dia) {
            echo "<td>" . (isset($cumplido[$dia]) ? $cumplido[$dia] : '') . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table></div>";
}

?>

