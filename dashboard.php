

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
    <link rel="stylesheet" href="estilosDashboard.css?v=<?=date('YmdHis', time());?>">
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
                <img src="images/logo.png" alt="Logo">
            </div>
            <div class="brand">
                InnerSync - Sincronízate
            </div>
            <div class="user-actions">
                <div class="dropdown header-profile2">
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                        <div class="header-info2 d-flex align-items-center">
                            <img src="images/profile/<?= isset($_SESSION['usuario']) ? 'perfil.webp' : ''; ?>" alt="Profile Picture">
                            <div class="d-flex align-items-center sidebar-info">
                                <div>
                                <small class="text-end font-w400">Bienvenid@</small>
                                <span class="font-w400 d-block"><?= isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?></span>
                                    
                                </div>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a href="mi_perfil.php" class="dropdown-item ai-icon">
                            <i class="fas fa-user" style="color: #007bff;"></i>
                            <span class="ms-2">Perfil</span>
                        </a>
                        <a href="logout.php" class="dropdown-item ai-icon">
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
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="d-flex align-items-center"> <!-- Este div contiene todos los elementos en línea -->

                    <div id="inspirational-quote" class="inspirational-quote"> 
                    <?php
                        $indiceAleatorio = array_rand($frases);
                        $fraseAleatoria = $frases[$indiceAleatorio];
                        echo $fraseAleatoria;
                        ?>
                    </div>
                </div>
                </div>
                <!-- Contenedor del datepicker fuera y debajo del div de los botones y fecha -->
                <div class="calendarWr"></div>
                <div class="dashboard-container">
                <div id="calendar"></div>
                <div id="main-container">
                <!-- Contenedor del clima -->
                <div class="widget-box" id="weather-container">
                    Temperatura en Torrevieja: 13.65°C
                </div>

                <!-- Contenedor de Tareas del día -->
                <div class="widget-box" id="tasksContainer">
                    <h3>Tareas del día</h3>
                    <button onclick="addNewItem('tasksList', 'Nueva tarea')">+</button>
                    <div class="list-container" id="tasksList">
                    <!-- Aquí se añadirán las tareas -->
                    </div>
                </div>

                <!-- Contenedor de Agradecimientos del día -->
                <div class="widget-box" id="thanksContainer">
                    <h3>Agradecimientos del día</h3>
                    <button onclick="addNewItem('thanksList', 'Nuevo agradecimiento')">+</button>
                    <div class="list-container" id="thanksList">
                    <!-- Aquí se añadirán los agradecimientos -->
                    </div>
                </div>
                </div>

            </div>
            </main>

        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2024 InnerSync</span>
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

?>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>-->
    <script src="js/dashboard.js"></script>
    <script src="js/calendar.js"></script>
   <!--<script src="js/date-navigation.js"></script>
    <script src="js/date-picker.js"></script>-->
    <script src="js/dashboard_container.js"></script>
    <script src="js/weather.js"></script>
    <script src="js/thanksContainer.js"></script>
    <script src="js/customHook.js?<?=date("YmdHis");?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
