<?php
include 'conexion.php';

$mensaje = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['habitos_seleccionados']) && !empty($_POST['habitos_seleccionados'])) 
    {
        $habitos_seleccionados = $_POST['habitos_seleccionados'];
        foreach ($habitos_seleccionados as $habito_id) 
        {
            $consulta = "INSERT INTO habitos (nombre, descripcion) VALUES (?, ?)";
            $stmt = $conexion->prepare($consulta);
            if ($stmt) {
                $stmt->bind_param("ss", $nombre, $descripcion); // Cambiado "ii" por "ss"
                $nombre = obtenerNombreHabito($conexion, $habito_id); // Obtener el nombre del hábito
                $descripcion = obtenerDescripcionHabito($conexion, $habito_id); // Obtener la descripción del hábito
                $stmt->execute();
                $stmt->close();
            } 
            else 
            {
                echo "Error al preparar la consulta: " . $conexion->error;
            }
        }
        
        $mensaje = "Los hábitos se han guardado correctamente.";
    } 
    else 
    {
        $mensaje = "Por favor, selecciona al menos un hábito.";
    }
}

function obtenerNombreHabito($conexion, $habito_id) {
    $consulta = "SELECT nombre FROM habitospredefinidos WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    if ($stmt) {
        $stmt->bind_param("i", $habito_id);
        $stmt->execute();
        $stmt->bind_result($nombre);
        $stmt->fetch();
        $stmt->close();
        return $nombre;
    } else {
        return null;
    }
}

function obtenerDescripcionHabito($conexion, $habito_id) {
    $consulta = "SELECT descripcion FROM habitospredefinidos WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    if ($stmt) {
        $stmt->bind_param("i", $habito_id);
        $stmt->execute();
        $stmt->bind_result($descripcion);
        $stmt->fetch();
        $stmt->close();
        return $descripcion;
    } else {
        return null;
    }
}

if (!empty($mensaje)) {
    echo '<p>' . $mensaje . '</p>';
}

?>

