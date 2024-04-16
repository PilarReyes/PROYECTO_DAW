<?php

include 'conexion.php';

$id_evento_especial = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $consulta = "DELETE FROM eventosespeciales WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) 
    {
        $stmt->bind_param("i", $id_evento_especial);
        if ($stmt->execute()) 
        {
            echo "Evento especial eliminado correctamente.";
        } 
        else 
        {
            echo "Error al eliminar el evento especial.";
        }
        $stmt->close();
    } 
    else 
    {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM eventosespeciales WHERE id=?";
if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("i", $id_evento_especial);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $nombre = $fila['nombre'];
            $fecha = $fila['fecha'];
            $tipo = $fila['tipo'];
            $notas = $fila['notas'];
        } 
        else 
        {
            echo "No se encontró el evento especial.";
            exit();
        }
    } 
    else 
    {
        echo "Error al ejecutar la consulta.";
        exit();
    }
    $stmt->close();
} 
else 
{
    echo "Error al preparar la consulta.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Evento Especial</title>
</head>
<body>

    <h1>Eliminar Evento Especial</h1>

    <h2>¿Está seguro de que desea eliminar el siguiente evento especial?</h2>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
    <p><strong>Tipo:</strong> <?php echo $tipo; ?></p>
    <p><strong>Notas:</strong> <?php echo $notas; ?></p>
    
    <form action="eliminar_evento_especial.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_evento_especial; ?>">
        <button type="submit">Eliminar Evento Especial</button>
    </form>

</body>
</html>
