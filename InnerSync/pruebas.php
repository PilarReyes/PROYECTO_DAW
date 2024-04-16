<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerSync - Tu Herramienta</title>
    <link rel="stylesheet" href="estilosContenido.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>

<header class="site-header">
    <div class="container">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <div class="brand">
            InnerSync
        </div>
    </div>
</header>

<!-- Menú desplegable usuario -->
<div class="dropdown header-profile2">
    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
        <div class="header-info2 d-flex align-items-center">
            <img src="images/profile/<?php echo isset($_SESSION['usuario']) ? 'pic1.jpg' : ''; ?>" alt="">
            <div class="d-flex align-items-center sidebar-info">
                <div>
                    <span class="font-w400 d-block"><?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?></span>
                    <small class="text-end font-w400">Perfil</small>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a href="app-profile.html" class="dropdown-item ai-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span class="ms-2">Perfil</span>
        </a>
        <a href="logout.php" class="dropdown-item ai-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            <span class="ms-2">Cerrar Sesión</span>
        </a>
    </div>
</div>
<!-- Fin del Menú desplegable usuario -->

<!-- Menú desplegable adicional -->
<div class="dropdown header-profile2">
    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
        <div class="header-info2 d-flex align-items-center">
            <!-- Aquí puedes poner la imagen o icono para el nuevo menú -->
            <div class="d-flex align-items-center sidebar-info">
                <div>
                    <small class="text-end font-w400">Otro Menú</small>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- Aquí agregas los elementos del nuevo menú -->
        <a href="#" class="dropdown-item ai-icon">Opción 1</a>
        <a href="#" class="dropdown-item ai-icon">Opción 2</a>
        <a href="#" class="dropdown-item ai-icon">Opción 3</a>
    </div>
</div>
<!-- Fin del Menú desplegable adicional -->

<!-- Contenido en el lado derecho -->
<div class="contenido-lateral">
    <!-- Aquí puedes agregar el contenido adicional que deseas mostrar en el lado derecho -->
</div>
<!-- Fin del contenido en el lado derecho -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

</body>
</html>
