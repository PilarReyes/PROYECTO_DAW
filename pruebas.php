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

<?php
include 'frases.php';
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
                    <?php include 'menu.php' ?>
                </ul>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="d-flex align-items-center"> <!-- Este div contiene todos los elementos en línea -->
                    <!-- Botones para navegar entre fechas -->
                    <button id="left-arrow" class="btn-date" onclick="previousDay();">&lt;</button>
                    
                    <!-- Donde se muestra la fecha actual -->
                    <span id="current-date" class="mx-2">Fecha</span>
                    
                    <!-- Botones para navegar entre fechas -->
                    <button id="right-arrow" class="btn-date" onclick="nextDay();">&gt;</button>

                    <!-- Botón para abrir el datepicker -->
                    <button onclick="openDatePicker();">&#x1F4C5;</button> <!-- Ícono de calendario -->
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

   
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>-->
    <script src="js/dashboard.js"></script>
    <script src="js/calendar.js"></script>
   <script src="js/date-navigation.js"></script>
    <script src="js/date-picker.js"></script>
    <!--<script src="js/dashboard_container.js"></script>-->
    <script src="js/weather.js"></script>
    <script src="js/thanksContainer.js"></script>
    <script src="js/customHook.js?<?=date("YmdHis");?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

