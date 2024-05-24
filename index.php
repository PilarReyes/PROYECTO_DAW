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
    <link rel="stylesheet" href="estilosContenido.css?v=<?=date("YmdHis", time());?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header class="site-header">
    <div class="container">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <div class="brand">
            InnerSync - Sincronízate
        </div>
        <div class="user-actions">
            <a href="page-login.php">Iniciar sesión</a>
            <a href="page-register.php">Registrarse</a>
        </div>
    </div>
</header>


<footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2024 InnerSync</span>
        </div>
    </footer>
    
<script src="index_content.js"></script>
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
</body>
</html>

