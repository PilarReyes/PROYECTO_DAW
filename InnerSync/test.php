<?php
// Realizar la solicitud a la URL de prueba
$response = file_get_contents("https://jsonplaceholder.typicode.com/posts/1");

// Devolver la respuesta al cliente
echo $response;
?>
