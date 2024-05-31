<?php

include 'models/core.php';

if(!session_start())
{
    header("HTTP/1.0 403 Unauthorized");
    die();
}


$email = $_SESSION['email'];
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];

if(empty($currentPassword) || empty($newPassword) || empty($confirmNewPassword)){
    header("HTTP/1.0 400 Unauthorized");
    die();
}

// Obtener el hash de la contraseña actual del usuario desde la base de datos
$query = new MySQL("SELECT password FROM usuarios WHERE email = '{$email}'");
$hashPassword = $query->getItem(0, 0);

// Verificar la contraseña actual
if (!password_verify($currentPassword, $hashPassword)) {
    header("HTTP/1.0 401 Unauthorized");
    die();
}

// Verificar que las nuevas contraseñas coincidan
if ($newPassword !== $confirmNewPassword) {
    header("HTTP/1.0 404 Not Found");
    die();
}
 cambiarPassword($email, $newPassword);

?>
