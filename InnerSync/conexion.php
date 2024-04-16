<?php

$conexion = mysqli_connect("localhost", "root", "", "BulletJournal");

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
} 
?>
