<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerSync - Sincronizate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilosContenido.css?v=<?=date("YmdHis", time());?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header class="site-header">
    <div class="container">
        <div class="logo">
            <img src="images/logo2.png" alt="Logo">
        </div>
        <div class="user-actions">
        <div class="user-actions">
            <a class="btn btn-custom" href="page-login.php">Iniciar sesión</a>

        </div>
        </div>
    </div>
</header>

<div class="main-content text-center">
    <h1>Bienvenido a InnerSync</h1>
    <p>Tu herramienta para organizar y sincronizar tus días de manera eficiente.</p>
    <a href="page-register.php" class="btn btn-primary btn-lg">Empieza ahora</a>
</div>


<footer id="footer" class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2024 InnerSync</span>
        </div>
    </footer>
    
<!--<script src="index_content.js"></script>-->
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
</body>
</html>
