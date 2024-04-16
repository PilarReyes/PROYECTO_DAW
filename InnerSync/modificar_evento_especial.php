<?php

include 'conexion.php';

$id_evento_especial = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nombre_modificado = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $fecha_modificada = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $tipo_modificado = isset($_POST["tipo"]) ? $_POST["tipo"] : "";
    $notas_modificadas = isset($_POST["notas"]) ? $_POST["notas"] : "";

    $consulta = "UPDATE eventosespeciales SET nombre=?, fecha=?, tipo=?, notas=? WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) 
    {
        $stmt->bind_param("ssssi", $nombre_modificado, $fecha_modificada, $tipo_modificado, $notas_modificadas, $id_evento_especial);
        if ($stmt->execute()) 
        {
            echo "Evento especial modificado correctamente.";
        } 
        else 
        {
            echo "Error al modificar el evento especial.";
        }
        $stmt->close();
    } 
    else 
    {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM eventosespeciales WHERE id=?";
if ($stmt = $conexion->prepare($sql)) 
{
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
    <title>Modificar Evento Especial</title>
</head>
<body>

    <h1>Modificar Evento Especial</h1>
    
    <form action="modificar_evento_especial.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>" required><br>
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="cumpleaños" <?php if ($tipo === 'cumpleaños') echo 'selected'; ?>>Cumpleaños</option>
            <option value="aniversario" <?php if ($tipo === 'aniversario') echo 'selected'; ?>>Aniversario</option>
            <!-- Agrega aquí más opciones de tipos de evento -->
        </select><br>
        <label for="notas">Notas:</label><br>
        <textarea name="notas" id="notas" rows="4" cols="50"><?php echo $notas; ?></textarea><br>
        <input type="hidden" name="id" value="<?php echo $id_evento_especial; ?>">
        <button type="submit">Modificar Evento Especial</button>
    </form>

</body>
</html>
