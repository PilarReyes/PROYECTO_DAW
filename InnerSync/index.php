<?php
session_start();


if (isset($_SESSION['usuario'])) 
{
    header('Location: index.php');
    exit(); 
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida a InnerSync</title>
    <link rel="stylesheet" href="estilosBienvenida.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="logo">
                <img src="images/logo.png" alt="InnerSync">
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="#">Sobre InnerSync</a></li>
                    <li><a href="#">Enlace 1</a></li>
                    <li><a href="#">Enlace 2</a></li>
                </ul>
            </nav>
            <div class="user-actions">
                <a href="page-login.php">Iniciar sesión</a>
                <a href="page-register.php">Registrarse</a>
            </div>
        </div>
    </header>
</body>
</html>
