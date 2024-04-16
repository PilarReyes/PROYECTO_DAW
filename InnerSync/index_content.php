<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerSync - Tu Herramienta</title>
    <link rel="stylesheet" href="estilosContenido.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            InnerSync
        </div>
    </div>
</header>

<!-- Menú desplegable -->
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
    <div class="dropdown-menu dropdown-menu-start">
        <a href="app-profile.html" class="dropdown-item ai-icon button">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span class="ms-2">Perfil</span>
        </a>
        <a href="logout.php" class="dropdown-item ai-icon button">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            <span class="ms-2">Cerrar Sesión</span>
        </a>
    </div>
</div>
<!-- Fin del Menú desplegable -->
<ul class="metismenu" id="menu">
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="fas fa-tasks"></i>
            <span class="nav-text">Mis Tareas</span>
        </button>
        <ul aria-expanded="false">
            <li><a class="button" href="ver_tareas.php">Ver Tareas</a></li>
            <li><a class="button" href="crear_tarea.php">Crear Tarea</a></li>
            <li><a class="button" href="modificar_tarea.php">Modificar Tarea</a></li>
            <li><a class="button" href="eliminar_tarea.php">Eliminar Tarea</a></li>
        </ul>
    </li>
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="far fa-calendar-alt"></i>
            <span class="nav-text">Mis Eventos</span>
        </button>
        <ul aria-expanded="false">
            <li><a class="button" href="ver_eventos.php">Ver Eventos</a></li>
            <li><a class="button" href="crear_evento.php">Crear Evento</a></li>
            <li><a class="button" href="modificar_evento.php">Modificar Evento</a></li>
            <li><a class="button" href="eliminar_evento.php">Eliminar Evento</a></li>
        </ul>
    </li>
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="far fa-calendar-plus"></i>
            <span class="nav-text">Fechas Especiales</span>
        </button>
        <ul aria-expanded="false">
            <li><a class="button" href="ver_fechas_especiales.php">Ver Fechas Especiales</a></li>
            <li><a class="button" href="crear_fecha_especial.php">Crear Fecha Especial</a></li>
            <li><a class="button" href="modificar_fecha_especial.php">Modificar Fecha Especial</a></li>
            <li><a class="button" href="eliminar_fecha_especial.php">Eliminar Fecha Especial</a></li>
        </ul>
    </li>
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="far fa-check-circle"></i>
            <span class="nav-text">Mis Hábitos</span>
        </button>
        <ul aria-expanded="false">
            <li><a class="button" href="ver_habitos.php">Ver Hábitos</a></li>
            <li><a class="button" href="crear_habito.php">Crear Hábito</a></li>
            <li><a class="button" href="historial_habitos.php">Historial de Hábitos</a></li>
        </ul>
    </li>
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="far fa-smile"></i>
            <span class="nav-text">Mi Estado de Ánimo</span>
        </button>
        <ul aria-expanded="false">
            <li><a class="button" href="ver_estado_animo.php">Ver Estado de Ánimo</a></li>
            <li><a class="button" href="modificar_estado_animo.php">Modificar Estado de Ánimo</a></li>
            <li><a class="button" href="historial_estado_animo.php">Historial de Estado de Ánimo</a></li>
        </ul>
    </li>
</ul>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<script src="index_content.js"></script>
<script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>

</body>
</html>
