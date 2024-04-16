<?php
// Procesar la solicitud de marcado de hábitos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los hábitos del usuario
    $habitos_usuario = obtenerHabitosDelUsuario();

    // Preparar la consulta SQL para actualizar los hábitos marcados
    $consulta = "UPDATE habitos_marcados SET marcado = 1 WHERE habito_id = ? AND dia = ?";
    $stmt = $conexion->prepare($consulta);

    if ($stmt) {
        // Recorrer los hábitos del usuario
        foreach ($habitos_usuario as $habito) {
            // Recorrer los días del calendario
            for ($dia = 1; $dia <= 31; $dia++) {
                // Construir el nombre del checkbox
                $nombre_checkbox = "habito_" . $habito['id'] . "_dia_" . $dia;
                
                // Verificar si el checkbox está marcado
                if (isset($_POST[$nombre_checkbox]) && $_POST[$nombre_checkbox] == 'on') {
                    // Obtener el ID del hábito y el número de día
                    $habito_id = $habito['id'];

                    // Asignar los parámetros y ejecutar la consulta
                    $stmt->bind_param("ii", $habito_id, $dia);
                    $stmt->execute();
                }
            }
        }
        // Cerrar la consulta
        $stmt->close();
    } else {
        // Manejar el error si la preparación de la consulta falla
        echo "Error al preparar la consulta: " . $conexion->error;
    }

    // Redirigir a la página principal o mostrar un mensaje de éxito
    // header("Location: principal.php");
    // exit;
}
?>
