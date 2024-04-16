<?php
include 'conexion.php';

$consulta = "SELECT * FROM eventosespeciales";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    echo "<h1>Listado de Eventos Especiales</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Fecha</th><th>Tipo</th><th>Notas</th><th>Acciones</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['fecha'] . "</td>";
        echo "<td>" . $fila['tipo'] . "</td>";
        echo "<td>" . $fila['notas'] . "</td>";
        echo "<td>";
        echo "<a href='modificar_evento_especial.php?id=" . $fila['id'] . "'>Modificar</a> | ";
        echo "<a href='eliminar_evento_especial.php?id=" . $fila['id'] . "'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} 
else 
{
    echo "No hay eventos especiales registrados.";
}


?>
