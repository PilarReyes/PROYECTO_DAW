<?php
session_start();

include '../conexion.php'; 


if (empty($_POST['usuario']) || empty($_POST['password'])) {
    header("HTTP/1.0 400 Bad Request");
    die(); 
}

$stmt = $db->prepare("SELECT password, nombre FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $_POST['usuario']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("HTTP/1.0 401 Unauthorized");
    die();
}

$row = $result->fetch_assoc();
$hashPassword = $row['password'];
$nombreUsuario = $row['nombre'];

if (!password_verify($_POST['password'], $hashPassword)) {
    header("HTTP/1.0 403 Forbidden");
    die();
}

$_SESSION['usuario'] = $nombreUsuario;
error_log("Usuario inició sesión: " . $_SESSION['usuario']);

?>

