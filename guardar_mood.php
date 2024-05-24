<?php
include 'models/core.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["estado_animo"])) {
    
    $estado_animo = isset($_POST["estado_animo"]) ? $_POST["estado_animo"] : "";

    if (insertarEstadoAnimo($estado_animo)) {
        echo "Estado de ánimo guardado exitosamente en historialmood.";
    } else {
        echo "Error al guardar el estado de ánimo en historialmood.";
    }
} else {
    echo "Error: No se ha enviado ningún estado de ánimo.";
}

?>

<br><a href="dashboard.php">Volver al inicio</a>
