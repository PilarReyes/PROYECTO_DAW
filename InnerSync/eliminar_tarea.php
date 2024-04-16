<?php

include 'conexion.php';

$id_tarea = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $consulta = "DELETE FROM tareas WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) {
        $stmt->bind_param("i", $id_tarea);
        if ($stmt->execute()) {
            echo "Tarea eliminada correctamente.";
        } else {
            echo "Error al eliminar la tarea.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM tareas WHERE id=?";
if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("i", $id_tarea);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $titulo = $fila['titulo'];
            $descripcion = $fila['descripcion'];
            $fecha = $fila['fecha'];
            $prioridad = $fila['prioridad'];
            $estado = $fila['estado'];
        } 
        else 
        {
            echo "No se encontró la tarea.";
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
    <title>Eliminar Tarea</title>
</head>
<body>

    <h1>Eliminar Tarea</h1>

    <h2>¿Está seguro de que desea eliminar la siguiente tarea?</h2>
    <p><strong>Título:</strong> <?php echo $titulo; ?></p>
    <p><strong>Descripción:</strong> <?php echo $descripcion; ?></p>
    <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
    <p><strong>Prioridad:</strong> <?php echo $prioridad; ?></p>
    <p><strong>Estado:</strong> <?php echo $estado; ?></p>
    
    <form action="eliminar_tarea.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_tarea; ?>">
        <button type="submit">Eliminar Tarea</button>
    </form>

</body>
</html>
