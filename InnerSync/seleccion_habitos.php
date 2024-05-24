<?php
include 'conexion.php';

function obtenerHabitosPredefinidos() {
    global $conexion;
  
    $consulta = "SELECT id, nombre FROM habitospredefinidos";
    $result = mysqli_query($conexion, $consulta);
    $habitospredeterminados = array();

    if ($result)
    {
        while ($fila = mysqli_fetch_assoc($result)) 
        {
            $habitospredeterminados[] = $fila;
        }
    } 
    else 
    { 
        echo "Error al obtener hábitos predefinidos: " . mysqli_error($conexion);
    }

    return $habitospredeterminados;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Hábitos</title>
</head>
<body>
    <h2>Selecciona tus hábitos:</h2>
    <form action="procesar_seleccion.php" method="POST">
        <?php
        $habitospredeterminados = obtenerHabitosPredefinidos();
        if (!empty($habitospredeterminados)) 
        {
            foreach ($habitospredeterminados as $habito) 
            {
                echo '<input type="checkbox" name="habitos_seleccionados[]" value="' . $habito['id'] . '">' . $habito['nombre'];
                echo '<br>';
            }
        } 
        else 
        {
            echo 'No se encontraron hábitos predefinidos.';
        }
        ?>
        <br>
        <input type="submit" value="Guardar">
    </form>
    <br>
    <form action="crear_habito.php" method="GET">
        <input type="submit" value="Crear Nuevo Hábito">
    </form>
</body>
</html>
