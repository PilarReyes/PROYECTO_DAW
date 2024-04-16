<?php

include 'conexion.php';

$id_tarea = isset($_GET['id']) ? $_GET['id'] : '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $titulo_modificado = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $descripcion_modificada = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $fecha_modificada = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $prioridad_modificada = isset($_POST["prioridad"]) ? $_POST["prioridad"] : "";
    $estado_modificado = isset($_POST["estado"]) ? $_POST["estado"] : "";

    
    $consulta = "UPDATE tareas SET titulo=?, descripcion=?, fecha=?, prioridad=?, estado=? WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) 
    {
        $stmt->bind_param("sssssi", $titulo_modificado, $descripcion_modificada, $fecha_modificada, $prioridad_modificada, $estado_modificado, $id_tarea);
        if ($stmt->execute()) 
        {
            echo "Tarea modificada correctamente.";
        } 
        else 
        {
            echo "Error al modificar la tarea.";
        }
        $stmt->close();
    } 
    else 
    {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM tareas WHERE id=?";
if ($stmt = $conexion->prepare($sql)) 
{
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
    <title>Modificar Tarea</title>
</head>
<body>

    <h1>Modificar Tarea</h1>
    
    <form action="modificar_tarea.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"><?php echo $descripcion; ?></textarea><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>" required><br>
        <label for="prioridad">Prioridad:</label>
        <select name="prioridad" id="prioridad">
            <option value="alta" <?php if ($prioridad == 'alta') echo 'selected'; ?>>Alta</option>
            <option value="media" <?php if ($prioridad == 'media') echo 'selected'; ?>>Media</option>
            <option value="baja" <?php if ($prioridad == 'baja') echo 'selected'; ?>>Baja</option>
        </select><br>
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="pendiente" <?php if ($estado == 'pendiente') echo 'selected'; ?>>Pendiente</option>
            <option value="completada" <?php if ($estado == 'completada') echo 'selected'; ?>>Completada</option>
            <option value="aplazada" <?php if ($estado == 'aplazada') echo 'selected'; ?>>Aplazada</option>
            <option value="cancelada" <?php if ($estado == 'cancelada') echo 'selected'; ?>>Cancelada</option>
        </select><br>
        <input type="hidden" name="id" value="<?php echo $id_tarea; ?>">
        <button type="submit">Modificar Tarea</button>
    </form>

</body>
</html>
