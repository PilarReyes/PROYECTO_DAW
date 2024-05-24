<?php

include 'conexion.php';


$consulta = "SELECT * FROM tareas";
$resultado = mysqli_query($conexion, $consulta);


if (mysqli_num_rows($resultado) > 0) {
    
    echo "<h1>Listado de Tareas</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Título</th><th>Descripción</th><th>Fecha</th><th>Prioridad</th><th>Estado</th></tr>";

  
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['titulo'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['fecha'] . "</td>";
        echo "<td>" . $fila['prioridad'] . "</td>";
        echo "<td>" . $fila['estado'] . "</td>";
        echo "<td><a href='modificar_tarea.php?id=" . $fila['id'] . "'>Modificar</a></td>";
        echo "<td><a href='eliminar_tarea.php?id=" . $fila['id'] . "'>Eliminar</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} 
else 
{
    
    echo "No hay tareas registradas.";
}

?>
