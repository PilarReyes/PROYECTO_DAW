<?php

include_once("{$_SERVER['DOCUMENT_ROOT']}/models/core.php");

 

if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['currentPassword']) || empty($_POST['newPassword']) || empty($_POST['confirmNewPassword'])) {
    header("HTTP/1.0 400 Bad Request");
    die();
}
    
    $hashPassword = new MySQL("SELECT password FROM usuarios WHERE email = '{$_COOKIE['usuario']}'");
  
    if(!password_verify($_POST['currentPassword'],$hashPassword->getItem(0,0)) || !strcmp($_POST['newPassword'], $_POST['confirmNewPassword']))
    { 
        header("HTTP/1.0 401 Unauthorized");
        die();
    }
    
    if(!strcmp($_POST['newPassword'], $_POST['confirmNewPassword']))
    { 
        header("HTTP/1.0 401 Unauthorized");
        die();
    }
    
    
    cambiarPassword($_COOKIE['usuario'], $newPassword, $notificar = true); 
