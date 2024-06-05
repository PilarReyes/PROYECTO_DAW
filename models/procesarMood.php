<?php

include 'core.php';

$estado_animo = $_POST["estado_animo"];

if (verificarEstadoAnimoRegistrado()) {
    header('HTTP/1.1 400 Bad Request');
    die();
} 
else 
{
    insertarEstadoAnimo($estado_animo); 
      
   
}


