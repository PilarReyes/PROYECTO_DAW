<?php

include 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $prioridad = isset($_POST["prioridad"]) ? $_POST["prioridad"] : "";
    $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
    
    if ($titulo === '' || $descripcion === '' || $fecha === '' || $prioridad === '' || $estado === '') 
    {
        $error = "Por favor, complete todos los campos.";
    } 
    else 
    {
        
        $consulta = "INSERT INTO tareas (titulo, descripcion, fecha, prioridad, estado) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conexion->prepare($consulta)) 
        {
            $stmt->bind_param("sssss", $titulo, $descripcion, $fecha, $prioridad, $estado);

            if ($stmt->execute()) {
                echo "Tarea creada correctamente.";
            } else {
                echo "Error al crear la tarea.";
            }
            $stmt->close();
        } 
        else 
        {
            $error = "Error al preparar la consulta.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
</head>
<body>

    <h1>Insertar Tarea</h1>
  

    <form action="insertar_tarea.php" method="post">
    <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"></textarea><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required><br>
        <label for="prioridad">Prioridad:</label>
        <select name="prioridad" id="prioridad">
            <option value="alta">Alta</option>
            <option value="media">Media</option>
            <option value="baja">Baja</option>
        </select><br>
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="pendiente">Pendiente</option>
            <option value="completada">Completada</option>
            <option value="aplazada">Aplazada</option>
            <option value="cancelada">Cancelada</option>
        </select><br>
        <button type="submit">Insertar Tarea</button>
    </form>

</body>
</html>
