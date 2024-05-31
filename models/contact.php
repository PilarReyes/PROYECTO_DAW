<?php

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

     // Configurar los detalles del correo electrónico
     $to = "pilposuna@hotmail.com"; // Cambia esto a tu dirección de correo electrónico
     $subject = "Nuevo mensaje de contacto de $name";
     $body = "
         <p>Nombre: $name</p>
         <p>Correo: $email</p>
         <p>Mensaje:</p>
         <p>$message</p>
     ";

    $destinatarios = [$to];
    if (enviarEmail($subject, $body, $destinatarios)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje.";
    }

?>
