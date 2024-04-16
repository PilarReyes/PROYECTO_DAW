<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registro'])) {
    $nombre = $_POST['nombre'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $contrasenya = $_POST['contrasenya'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($nombre == '' || $usuario == '' || $contrasenya == '' || $email == '') {
        header('Location: registro.php?error=Debe rellenar los campos vacíos');
        exit();
    }

    // Consulta preparada para verificar si el usuario ya existe
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    
    // Verificar si la consulta se preparó correctamente
    if (!$consulta) {
        die('Error al preparar la consulta: ' . $conexion->error);
    }
    
    // Asociar parámetros y ejecutar la consulta
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        header('Location: registro.php?error=Usuario ya existe');
        exit();
    } else {
        // Cifrar la contraseña
        $contra_cifrada = password_hash($contrasenya, PASSWORD_DEFAULT);

        // Consulta preparada para insertar el nuevo usuario
        $query = $conexion->prepare("INSERT INTO usuarios (nombre, usuario, email, password) VALUES (?, ?, ?, ?)");

        // Verificar si la consulta se preparó correctamente
        if (!$query) {
            die('Error al preparar la consulta: ' . $conexion->error);
        }
        
        // Asociar parámetros y ejecutar la consulta
        $query->bind_param("ssss", $nombre, $usuario, $email, $contra_cifrada);
        if ($query->execute()) {
            echo "Registro exitoso";
            // Redireccionar al usuario o mostrar mensaje de éxito
        } else {
            echo "Error al ejecutar la consulta: " . $query->error;
            // Manejar el error
        }

        $query->close();
    }

    $consulta->close();
    $conexion->close();
}
?>

<a href="index.php">Volver</a>