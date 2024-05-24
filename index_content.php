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
    <link rel="stylesheet" href="estilosBienvenida.css?v=<?=date("YmdHis", time());?>">
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

<ul class="metismenu" id="menu">
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="fas fa-tasks"></i>
            <span class="nav-text">Mis Tareas</span>
        </button>
        <ul aria-expanded="false">
            <li><a href="ver_tareas.php">Ver Tareas</a></li>
            <li><a href="crear_tarea.php">Crear Tarea</a></li>
            <li><a href="modificar_tarea.php">Modificar Tarea</a></li>
            <li><a href="eliminar_tarea.php">Eliminar Tarea</a></li>
        </ul>
    </li>
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="far fa-calendar-alt"></i>
            <span class="nav-text">Mis Eventos</span>
        </button>
        <ul aria-expanded="false">
            <li><a href="ver_eventos.php">Ver Eventos</a></li>
            <li><a href="crear_evento.php">Crear Evento</a></li>
            <li><a href="modificar_evento.php">Modificar Evento</a></li>
            <li><a href="eliminar_evento.php">Eliminar Evento</a></li>
        </ul>
    </li>
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="far fa-calendar-plus"></i>
            <span class="nav-text">Fechas Especiales</span>
        </button>
        <ul aria-expanded="false">
            <li><a href="ver_fechas_especiales.php">Ver Fechas Especiales</a></li>
            <li><a href="crear_fecha_especial.php">Crear Fecha Especial</a></li>
            <li><a href="modificar_fecha_especial.php">Modificar Fecha Especial</a></li>
            <li><a href="eliminar_fecha_especial.php">Eliminar Fecha Especial</a></li>
        </ul>
    </li>
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="far fa-check-circle"></i>
            <span class="nav-text">Mis Hábitos</span>
        </button>
        <ul aria-expanded="false">
            <li><a href="ver_habitos.php">Ver Hábitos</a></li>
            <li><a href="crear_habito.php">Crear Hábito</a></li>
            <li><a href="historial_habitos.php">Historial de Hábitos</a></li>
        </ul>
    </li>
    <li>
        <button class="has-arrow" aria-expanded="false">
            <i class="far fa-smile"></i>
            <span class="nav-text">Mi Estado de Ánimo</span>
        </button>
        <ul aria-expanded="false">
            <li><a href="ver_estado_animo.php">Ver Estado de Ánimo</a></li>
            <li><a href="modificar_estado_animo.php">Modificar Estado de Ánimo</a></li>
            <li><a href="historial_estado_animo.php">Historial de Estado de Ánimo</a></li>
        </ul>
    </li>
</ul>


<footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2024 InnerSync</span>
        </div>
    </footer>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    var arrows = document.querySelectorAll('.has-arrow');
    arrows.forEach(function(arrow) {
        arrow.addEventListener('click', function () {
            var expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);
            var submenu = this.nextElementSibling;
            submenu.style.display = expanded ? 'none' : 'block';  // Esto toma el lugar de la clase 'show'
        });
    });
});
</script>
<script src="index_content.js"></script>
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
</body>
</html>

   
