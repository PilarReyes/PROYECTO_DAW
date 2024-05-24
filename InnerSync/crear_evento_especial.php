<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
 
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
    $notas = isset($_POST['notas']) ? $_POST['notas'] : '';

    $consulta = "INSERT INTO eventosespeciales (nombre, fecha, tipo, notas) VALUES (?, ?, ?, ?)";
    
    if ($nombre === '' || $fecha === '' || $tipo === '') 
    {
        $error = "Por favor, complete todos los campos.";
    } 

    else 

    {
        $consulta = "INSERT INTO eventosespeciales (nombre, fecha, tipo, notas) VALUES (?, ?, ?, ?)";

        if ($stmt = $conexion->prepare($consulta)) 
        {
            $stmt->bind_param("ssss", $nombre, $fecha, $tipo, $notas);

            if ($stmt->execute()) 
            {
                echo "Evento Especial creado correctamente.";
            } 
            else 
            {
                echo "Error al crear eñ evento.";
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
    <title>Crear Evento</title>
</head>
<body>
    <h1>Crear Evento</h1>
    
    <form action="crear_evento_especial.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required><br>
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo">
            <option value="cumpleaños">Cumpleaños</option>
            <option value="aniversario">Aniversario</option>
            <option value="bautizo">Bautizo</option>
            <option value="graduacion">Graduación</option>
            <option value="boda">Boda</option>
            <option value="promocion">Promoción Laboral</option>
            <option value="jubilacion">Jubilación</option>
            <option value="fecha_conmemorativa">Fecha Conmemorativa</option>
            <option value="vacaciones">Vacaciones o Viajes</option>
            <option value="evento_cultural">Evento Cultural</option>
        </select><br>
        <label for="notas">Notas:</label><br>
        <textarea name="notas" id="notas" rows="4" cols="50"></textarea><br>
        <button type="submit">Crear Evento</button>
    </form>

</body>
</html>
