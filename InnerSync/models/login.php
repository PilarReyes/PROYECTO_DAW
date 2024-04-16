<?php

if (empty($_POST['usuario']) || empty($_POST['password'])) {
    header("HTTP/1.0 400 Bad Request");
    die();
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

include '../models/mysql.php';

$consulta = "SELECT nombre, password FROM usuarios WHERE usuario = '$usuario'";
$query = new MySQL($consulta);

if (!$query->getFilas() || !password_verify($password, $query->getItem(0, 'password'), PASSWORD_BCRYPT)) {
    header("HTTP/1.0 401 Unauthorized");
    die();
}

$nombreUsuario = $query->getItem(0, 'nombre');

// Iniciar sesión o establecer cualquier otro estado de sesión necesario
session_start();
$_SESSION['usuario'] = $nombreUsuario;

header("Location: ../index_content.php");
?>



