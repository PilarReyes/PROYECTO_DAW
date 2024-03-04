<?php

$conexion=mysqli_connect("localhost", "root", "", "BulletJournal");

if(!$conexion)
{
    echo "Error en la conexión".mysqli_connect_error();
}

?>