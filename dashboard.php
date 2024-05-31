<?php
include 'models/frases.php';
session_start();

if (!isset($_SESSION['usuario'])) {
   header('Location: page-login.php'); 
   exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerSync, Dashboard</title>
    <link rel="stylesheet" href="css/estilosDashboard.css?v=<?=date('YmdHis', time());?>">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="logo">
                <img src="images/logo2.png" alt="Logo">
            </div>
            <div class="brand">
                InnerSync - Sincronízate
            </div>
            <div class="user-actions">
                <div class="dropdown header-profile2">
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                        <div class="header-info2 d-flex align-items-center">
                            <img id="pic" src="images/profile/<?= isset($_SESSION['nombre']) ? 'perfil2.png' : ''; ?>" alt="Profile Picture">
                            <div class="d-flex align-items-center sidebar-info">
                                <div id= "welcome">
                                    <small  class="text-end font-w400">Bienvenid@</small>
                                    <span class="font-w400 d-block"><?= isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?></span>
                                </div>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a href="views/mi_perfil.php" class="dropdown-item ai-icon">
                            <i class="fas fa-user" style="color: #007bff;"></i>
                            <span class="ms-2">Perfil</span>
                        </a>
                        <a href="models/logout.php" class="dropdown-item ai-icon">
                            <i class="fas fa-sign-out-alt" style="color: #dc3545;"></i>
                            <span class="ms-2">Cerrar Sesión</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <!-- Menú de navegación -->
                <ul class="metismenu" id="menu">
                    <li>
                        <button class="has-arrow" aria-expanded="false">
                            <i class="fas fa-tasks"></i>
                            <span class="nav-text">Tareas</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a id="listar-tareas-link" href="views/verTareas.php">Ver mis tareas</a></li>
                            <li><a id="crear-tarea-link" href="views/crearTarea.php">Crear Tarea</a></li>
                        </ul>
                    </li>
                    <li>
                        <button class="has-arrow" aria-expanded="false">
                            <i class="far fa-calendar-alt"></i>
                            <span class="nav-text">Eventos</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a id="ver-eventos-link" href="views/verEventos.php">Ver mis eventos</a></li>
                            <li><a id="crear-evento-link" href="views/crearEvento.php">Crear Evento</a></li>
                        </ul>
                    </li>
                    <li>
                        <button class="has-arrow" aria-expanded="false">
                            <i class="far fa-calendar-plus"></i>
                            <span class="nav-text">Fechas Especiales</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a id="ver-fechas-link" href="views/verFechasEspeciales.php">Ver Fechas Especiales</a></li>
                            <li><a id="crear-fecha-link" href="views/crearFechaEspecial.php">Crear Fecha Especial</a></li>
                        </ul>
                    </li>
                    <li>
                        <button class="has-arrow" aria-expanded="false">
                            <i class="far fa-check-circle"></i>
                            <span class="nav-text">Hábitos</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a id="seleccion_habitos-link" href="views/seleccionHabitos.php">Seleccionar Hábitos</a></li>
                            <li><a id="crear-habito-link" href="views/crearHabito.php">Crear Hábito</a></li>
                            <li><a id="mis-habitos-link" href="views/MisHabitos.php">Mis hábitos</a></li>
                            <li><a id="historial-habitos-link" href="views/habitosTracker.php">Historial de Hábitos</a></li>
                        </ul>
                    </li>
                    <li>
                        <button class="has-arrow" aria-expanded="false">
                            <i class="far fa-smile"></i>
                            <span class="nav-text">Estado de Ánimo</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a id="ver-estado-animo-link" href="views/moodTracker.php">Estado de Ánimo</a></li>
                            <li><a id="historial-estado-animo-link" href="views/historicoMoodTracker.php">Historial de Estado de Ánimo</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div id="box" class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <div id="inspirational-quote" class="inspirational-quote"> 
                            <?php
                            $indiceAleatorio = array_rand($frases);
                            $fraseAleatoria = $frases[$indiceAleatorio];
                            echo $fraseAleatoria;
                            ?>
                        </div> 
                    </div>
                    <!-- Contenedor del clima -->
                    <div class="widget-box" id="weather-container">
                            Temperatura en Torrevieja: 13.65°C
                        </div>
                </div>
                <!-- Contenido del dashboard -->
                <div class="calendarWr"></div>
                <div class="dashboard-container">
                    <div id="calendar"></div>
            </main>
        </div>
    </div>
   
    <footer id="footer" class="footer mt-auto py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center justify-content-start mb-3 mb-md-0">
                <div class="social-icons">
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="images/icons/facebook.png" alt="Facebook" class="social-icon">
                    </a>
                    <a href="https://www.twitter.com" target="_blank">
                        <img src="images/icons/gorjeo.png" alt="Twitter" class="social-icon">
                    </a>
                    <a href="https://www.instagram.com" target="_blank">
                        <img src="images/icons/instagram.png" alt="Instagram" class="social-icon">
                    </a>
                    <a href="https://www.tiktok.com" target="_blank">
                        <img src="images/icons/tik-tok.png" alt="TikTok" class="social-icon">
                    </a>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">
                    <i class="fas fa-envelope"></i> Contáctanos
                </button>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-end">
                <span class="custom-text">© 2024 InnerSync. Todos los derechos reservados.</span>
            </div>
        </div>
    </div>
</footer>

 
<?php
include 'modals/modalTareaMod.php';
include 'modals/modalTareaEli.php';
include 'modals/modalEventoMod.php';
include 'modals/modalEventoEli.php';
include 'modals/modalFechaEspecialMod.php';
include 'modals/modalFechaEspecialEli.php';
include 'modals/modalHabitoEli.php';
include 'modals/modalFooter.php';
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/calendar.js"></script>
<script src="js/dashboard_container.js"></script>
<script src="js/weather.js"></script>
<script src="js/thanksContainer.js"></script>
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
