<?php
include_once 'core.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $habito_id = $_POST['id'];
        echo "ID del hábito a eliminar: " . $habito_id . "<br>"; // Mensaje de depuración

        // Intentar marcar el hábito como inactivo
        if (marcarHabitoInactivo($habito_id)) {
            echo "Hábito marcado como inactivo correctamente";
        } else {
            echo "Error al marcar el hábito como inactivo";
        }
    } else {
        echo "Error: No se proporcionó el ID del hábito.";
    }
} else {
    echo "Error: Solicitud inválida.";
}


?>
