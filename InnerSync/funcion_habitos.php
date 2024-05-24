<?php
include 'conexion.php';

// Función para obtener los hábitos del usuario
function obtenerHabitosDelUsuario() {
    global $conexion;

    $consulta = "SELECT id, nombre, descripcion FROM habitos";
    $stmt = $conexion->prepare($consulta);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        $habitos_usuario = [];
        while ($row = $result->fetch_assoc()) {
            $habitos_usuario[] = $row;
        }

        $stmt->close();
    } else 
    {
        echo "Error al preparar la consulta: " . $conexion->error;
        return []; // Array vacío en caso de error
    }

    return $habitos_usuario;
}


// Función para generar el calendario
function generarCalendario($num_dias = 31) {
    $calendario = [];
    $fecha_actual = strtotime('today');

    for ($i = 0; $i < $num_dias; $i++) {
        $fecha = strtotime("+$i day", $fecha_actual);
        $dia = date('Y-m-d', $fecha);
        $calendario[$dia] = date('d/m', $fecha);
    }

    return $calendario;
}

// Generar el calendario
$calendario = generarCalendario();

// Obtener los hábitos del usuario
$habitos_usuario = obtenerHabitosDelUsuario();
?>