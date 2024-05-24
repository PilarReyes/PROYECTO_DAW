<?php
include 'conexion.php';
include 'mysql.php';

    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $contrasenya = $_POST['contrasenya'] ?? '';
    $email = $_POST['email'] ?? '';

    if (empty($nombre) || empty($apellidos) || empty($usuario) || empty($contrasenya)  || empty($email)) {
        header("HTTP/1.0 400 Bad Request");
        die();
    }

   
    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    

    // Asociar parámetros y ejecutar la consulta
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        header("HTTP/1.0 409 Bad Request");
        die();
       
    } else {
        // Cifrar la contraseña
        $contra_cifrada = password_hash($contrasenya, PASSWORD_DEFAULT);

        // Consulta preparada para insertar el nuevo usuario
        $query = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, email, password, usuario) VALUES (?, ?, ?, ?, ?)");

 
        // Asociar parámetros y ejecutar la consulta
        $query->bind_param("sssss", $nombre, $apellidos, $email, $contra_cifrada, $usuario,);
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

?>

<a href="index.php">Volver</a>