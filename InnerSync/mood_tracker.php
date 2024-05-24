<?php
include 'conexion.php'; 

$consulta = "SELECT DISTINCT estado_animo FROM moodtracker"; 
$resultado = $conexion->query($consulta);

if (!$resultado) {
    echo "Error al obtener los estados de ánimo: " . $conexion->error;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker</title>
</head>
<body>
    <h2>¿Cómo te sientes hoy?</h2>
    <form action="guardar_mood.php" method="POST">
        <select name="estado_animo">
            <?php while ($fila = $resultado->fetch_assoc()) : ?>
                <option value="<?php echo $fila['estado_animo']; ?>"><?php echo $fila['estado_animo']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

