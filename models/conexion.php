<?php

$conexion = mysqli_connect("localhost", "root", "", "innersync");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
} 
?>
