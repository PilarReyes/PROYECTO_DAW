<?php
include 'conexion.php';



if (empty($_POST['usuario']) || empty($_POST['password'])) {
    header("HTTP/1.0 400 Bad Request");
    die();
}

$usuarioEscapado = $conexion->real_escape_string($_POST['usuario']);

// Consulta preparada para seleccionar el nombre de usuario y la contraseña
$consulta = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conexion->prepare($consulta);
$stmt->bind_param("s", $usuarioEscapado);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si se encontró un usuario con el nombre proporcionado
if ($resultado->num_rows == 0) {
    header("HTTP/1.0 401 Unauthorized");
    die();
}

// Obtener el resultado de la consulta
$usuario = $resultado->fetch_assoc();
$nombreUsuario = $usuario['usuario'];
$hashPassword = $usuario['password'];
$apellidosUsuario=$usuario['apellidos'];
$emailUsuario=$usuario['email'];
$nombreUser=$usuario['nombre'];
$idUsuario = $usuario['id'];

// Verificar si la contraseña proporcionada coincide con la almacenada en la base de datos
if (!password_verify($_POST['password'], $hashPassword)) {
    header("HTTP/1.0 403 Forbidden");
    die();
}

// Iniciar sesión con el nombre de usuario
session_start();

$_SESSION['usuario'] = $nombreUsuario;
$_SESSION['apellidos'] = $apellidosUsuario;
$_SESSION['email'] = $emailUsuario;
$_SESSION['nombre'] = $nombreUser;
$_SESSION['idUsuario'] = $idUsuario;


// Redirigir a otra página después de iniciar sesión
header("Location: ../dashboard.php");
exit();
?>
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
