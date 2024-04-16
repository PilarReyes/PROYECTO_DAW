<?php
session_start();

$error = isset($_GET['error']) ? $_GET['error'] : '';
echo "$error";

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasenya'] ?? '';

    if ($usuario == '' || $contrasena == '') {
        // Redireccionar al usuario a la página de login con un mensaje de error
        header('Location: login.php?error=' . urlencode("Debes rellenar los campos vacíos"));
        exit();
    } else {
        // Preparar la consulta SQL para evitar inyecciones SQL
        $consulta = $conexion->prepare("SELECT nombre, usuario, password FROM usuarios WHERE usuario = ?");
        $consulta->bind_param("s", $usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            if (password_verify($contrasena, $fila['password'])) {
                // Autenticación exitosa, establecer variables de sesión, etc.
                $_SESSION['usuario'] = $fila['usuario'];
                $_SESSION['nombre'] = $fila['nombre'];
                // Redireccionar al usuario a index
                header('Location: index.php');
                exit();
            } else {
                // Contraseña incorrecta
                header('Location: login.php?error=' . urlencode("Usuario o contraseña incorrecta"));
                exit();
            }
        } else {
            // Usuario no existe
            header('Location: login.php?error=' . urlencode("Usuario o contraseña incorrecta"));
            exit();
        }
        $consulta->close();
    }
    $conexion->close();
}
?>
