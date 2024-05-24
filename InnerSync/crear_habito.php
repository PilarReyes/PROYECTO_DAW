<?php

include 'conexion.php';

$error = '';
$exito = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
    $frecuencia = isset($_POST['frecuencia']) ? $_POST['frecuencia'] : '';

    
    if (empty($nombre) || empty($descripcion) || empty($fecha_inicio) || empty($frecuencia)) {
        $error = "Por favor, complete todos los campos.";
    } 
    else 
    {
 
        $consulta = "INSERT INTO habitos (nombre, descripcion, fecha_inicio, frecuencia) VALUES (?, ?, ?, ?)";

        if ($stmt = $conexion->prepare($consulta)) {
           
            $stmt->bind_param("ssss", $nombre, $descripcion, $fecha_inicio, $frecuencia);

            if ($stmt->execute()) 
            {
                $exito = "Hábito creado correctamente.";
            } 
            else 
            {
                $error = "Error al crear el hábito.";
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
    <title>Crear Hábito</title>
</head>
<body>
    <h1>Crear Nuevo Hábito</h1>
    
    <?php if (!empty($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <?php if (!empty($exito)) : ?>
        <p style="color: green;"><?php echo $exito; ?></p>
    <?php endif; ?>
    
    <form action="crear_habito.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br>
        <label for="fecha_inicio">Fecha de Inicio:</label><br>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required><br>
        <label for="frecuencia">Frecuencia:</label><br>
        <select id="frecuencia" name="frecuencia" required>
            <option value="diaria">Diaria</option>
            <option value="semanal">Semanal</option>
            <option value="mensual">Mensual</option>
        </select><br><br>
        <input type="submit" value="Crear Hábito">
    </form>
</body>
</html>
