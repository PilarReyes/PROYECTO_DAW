<?php
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["estado_animo"])) {
    
    $estado_animo = isset($_POST["estado_animo"]) ? $_POST["estado_animo"] : "";

    $consulta = "INSERT INTO historialmood (estado_animo, fecha) VALUES (?, CURDATE())";

    $declaracion = $conexion->prepare($consulta);

    $declaracion->bind_param("s", $estado_animo);
 
    if ($declaracion->execute()) 
    {
        echo "Estado de ánimo guardado exitosamente en historialmood.";
    } 
    else 
    {
        echo "Error al guardar el estado de ánimo en historialmood: " . $declaracion->error;
    }


} else {
    echo "Error: No se ha enviado ningún estado de ánimo.";
}
?>
