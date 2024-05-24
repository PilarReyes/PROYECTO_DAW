<?php

include 'conexion.php';

$id_evento = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nombre_modificado = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $descripcion_modificada = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $fecha_inicio_modificada = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
    $fecha_fin_modificada = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : "";
    $ubicacion_modificada = isset($_POST["ubicacion"]) ? $_POST["ubicacion"] : "";

    $consulta = "UPDATE eventos SET nombre=?, descripcion=?, fecha_inicio=?, fecha_fin=?, ubicacion=? WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) 
    {
        $stmt->bind_param("sssssi", $nombre_modificado, $descripcion_modificada, $fecha_inicio_modificada, $fecha_fin_modificada, $ubicacion_modificada, $id_evento);
        if ($stmt->execute()) 
        {
            echo "Evento modificado correctamente.";
        } 
        else 
        {
            echo "Error al modificar el evento.";
        }
        $stmt->close();
    } 
    else 
    {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM eventos WHERE id=?";
if ($stmt = $conexion->prepare($sql)) 
{
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
    <title>Modificar Evento</title>
</head>
<body>

    <h1>Modificar Evento</h1>
    
    <form action="modificar_evento.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"><?php echo $descripcion; ?></textarea><br>
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fecha_inicio; ?>" required><br>
        <label for="fecha_fin">Fecha de Finalización:</label>
        <input type="datetime-local" name="fecha_fin" id="fecha_fin" value="<?php echo $fecha_fin; ?>"><br>
        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $ubicacion; ?>" required><br>
        <input type="hidden" name="id" value="<?php echo $id_evento; ?>">
        <button type="submit">Modificar Evento</button>
    </form>

</body>
</html>
