<?php

include 'conexion.php';


$consulta = "SELECT * FROM eventos";
$resultado = mysqli_query($conexion, $consulta);


if (mysqli_num_rows($resultado) > 0) {
    
    echo "<h1>Listado de Eventos</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Descripción</th><th>Fecha de Inicio</th><th>Fecha de Fin</th><th>Ubicación</th></tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila['nombre'] . "</td>";
    echo "<td>" . $fila['descripcion'] . "</td>";
    echo "<td>" . $fila['fecha_inicio'] . "</td>";
    echo "<td>" . $fila['fecha_fin'] . "</td>";
    echo "<td>" . $fila['ubicacion'] . "</td>";
    echo "<td><a href='modificar_evento.php?id=" . $fila['id'] . "'>Modificar</a></td>";
    echo "<td><a href='eliminar_evento.php?id=" . $fila['id'] . "'>Eliminar</a></td>";
    echo "</tr>";
}

    echo "</table>";
} 
else 
{ 
    echo "No hay eventos registrados.";
}

?>
