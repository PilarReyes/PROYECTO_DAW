<?php

include 'conexion.php';

$id_evento = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $consulta = "DELETE FROM eventos WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) {
        $stmt->bind_param("i", $id_evento);
        if ($stmt->execute()) {
            echo "Evento eliminado correctamente.";
        } else {
            echo "Error al eliminar el evento.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM eventos WHERE id=?";
if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("i", $id_evento);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $nombre = $fila['nombre'];
            $descripcion = $fila['descripcion'];
            $fecha_inicio = $fila['fecha_inicio'];
            $fecha_fin = $fila['fecha_fin'];
            $ubicacion = $fila['ubicacion'];
        } 
        else 
        {
            echo "No se encontró el evento.";
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
    <title>Eliminar Evento</title>
</head>
<body>

    <h1>Eliminar Evento</h1>

    <h2>¿Está seguro de que desea eliminar el siguiente evento?</h2>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Descripción:</strong> <?php echo $descripcion; ?></p>
    <p><strong>Fecha de Inicio:</strong> <?php echo $fecha_inicio; ?></p>
    <p><strong>Fecha de Finalización:</strong> <?php echo $fecha_fin; ?></p>
    <p><strong>Ubicación:</strong> <?php echo $ubicacion; ?></p>
    
    <form action="eliminar_evento.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_evento; ?>">
        <button type="submit">Eliminar Evento</button>
    </form>

</body>
</html>
