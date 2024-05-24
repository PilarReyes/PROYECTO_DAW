<?php
include 'models/core.php'; 

$estadosAnimo = obtenerMood();

if (empty($estadosAnimo)) {
    echo "Error al obtener los estados de ánimo o no hay datos disponibles.";
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
            <?php foreach ($estadosAnimo as $fila) : ?>
                <option value="<?php echo $fila['estado_animo']; ?>"><?php echo $fila['estado_animo']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

