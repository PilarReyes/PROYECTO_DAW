
<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
    $notas = isset($_POST['notas']) ? $_POST['notas'] : '';

    if ($nombre === '' || $fecha === '' || $tipo === '') {
        $error = "Por favor, complete todos los campos.";
    } else {
        $consulta = "INSERT INTO eventosespeciales (id_usuario, nombre, fecha, tipo, notas) VALUES (?, ?, ?, ?, ?)";
        
        if ($stmt = $conexion->prepare($consulta)) {
            $id_usuario = obtenerIdUsuarioActual(); // Supongamos que el ID de usuario se obtiene de alguna manera
            $stmt->bind_param("issss", $id_usuario, $nombre, $fecha, $tipo, $notas);
            
            if ($stmt->execute()) {
                echo "Evento especial creado correctamente.";
            } else {
                echo "Error al crear el evento especial.";
            }
            
            $stmt->close();
        } else {
            echo "Error al preparar la consulta.";
        }
    }
} else {
    echo "Acceso denegado.";
}

function obtenerIdUsuarioActual() {
    // Lógica para obtener el ID de usuario actual (por ejemplo, desde la sesión)
    return 1; // Por ahora, retornamos un valor estático para fines de demostración
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

    <h1>Crear Nuevo Evento</h1>
    
    <form action="crear_evento.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"></textarea><br>
        
        <label for="fecha_inicio">Fecha y Hora de Inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" required><br>
        
        <label for="fecha_fin">Fecha y Hora de Fin:</label>
        <input type="date" name="fecha_fin" id="fecha_fin"><br>
        
        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacion"><br>
        
        <button type="submit">Crear Evento</button>
    </form>

</body>
</html>
