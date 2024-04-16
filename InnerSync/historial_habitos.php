<?php
include 'conexion.php';
include "funcion_habitos.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar_historial'])) {
    // Recorrer cada hábito del usuario
    foreach ($habitos_usuario as $habito) {
        // Recorrer cada día del calendario
        foreach ($calendario as $dia => $nombre_dia) {
            // Construir el nombre del checkbox correspondiente a este hábito y día
            $nombre_checkbox = "habito_" . $habito['id'] . "_dia_" . $dia;
            
            // Verificar si el checkbox está marcado
            if (isset($_POST[$nombre_checkbox]) && $_POST[$nombre_checkbox] == 'on') {
                // Guardar el historial del hábito marcado en la base de datos
                $consulta = "INSERT INTO historicohabitos (id_habito, fecha, completado) VALUES (?, ?, 1)";
                $stmt = $conexion->prepare($consulta);
                if ($stmt) {
                    $stmt->bind_param("is", $habito['id'], $dia);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    echo "Error al preparar la consulta: " . $conexion->error;
                }
            }
        }
    }

    // Mostrar mensaje de éxito
    echo "El historial de hábitos se ha guardado correctamente.";
}
?>
