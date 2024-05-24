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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilosDashboard.css?v=<?=date('YmdHis', time());?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

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
                        <a href="app-profile.html" class="dropdown-item ai-icon">
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
            <?php include('menu.php'); ?>
                <ul class="metismenu" id="menu">
                    <li>
                        <button class="has-arrow" aria-expanded="false">
                            <i class="fas fa-tasks"></i>
                            <span class="nav-text">Tareas</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a href="ver_tareas.php">Ver  mis tareas</a></li>
                            <li><a href="crear_tarea.php">Crear Tarea</a></li>
                            <li><a href="modificar_tarea.php">Modificar Tarea</a></li>
                            <li><a href="eliminar_tarea.php">Eliminar Tarea</a></li>
                        </ul>
                    </li>
                    <li>
                        <button class="has-arrow" aria-expanded="false">
                            <i class="far fa-calendar-alt"></i>
                            <span class="nav-text">Eventos</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a href="ver_eventos.php">Ver mis eventos</a></li>
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
                            <span class="nav-text">Hábitos</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a href="ver_habitos.php">Ver mis hábitos</a></li>
                            <li><a href="crear_habito.php">Crear Hábito</a></li>
                            <li><a href="historial_habitos.php">Historial de Hábitos</a></li>
                        </ul
                    </li>
                    <li>
                        <button class="has-arrow" aria-expanded="false">
                            <i class="far fa-smile"></i>
                            <span class="nav-text">Estado de Ánimo</span>
                        </button>
                        <ul aria-expanded="false">
                            <li><a href="ver_estado_animo.php">Ver Estado de Ánimo</a></li>
                            <li><a href="modificar_estado_animo.php">Modificar Estado de Ánimo</a></li>
                            <li><a href="historial_estado_animo.php">Historial de Estado de Ánimo</a></li>
                        </ul>
                    </li>
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
                <p>Contenido principal del Dashboard.</p>
                <!-- ... más contenido ... -->
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

            <!-- Contenedor de las tareas, inicialmente oculto -->
            <div id="tasks-container" style="display: none;">
                <p>tareas.</p>
            </div>
            </main>

        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2024 InnerSync</span>
        </div>
    </footer>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/date-navigation.js"></script>
    <script src="js/date-picker.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/weather.js"></script>
    <script src="js/thanksContainer.js"></script>
</body>
</html>
  <!--ver tarea-->
  <?php

include 'models/core.php';
include 'models/conexion.php';

$consulta = "SELECT * FROM tareas";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) { ?>

    <h1>Listado de Tareas</h1>
    <form action="eliminar_tarea.php" method="post">  <!-- Formulario para eliminación masiva -->
        <table border='1'>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Modificar</th>
                <th>Eliminar</th>  <!-- Encabezado para la columna de checkbox -->
            </tr>

            <?php
            while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?= htmlspecialchars($fila['titulo']) ?></td>
                    <td><?= htmlspecialchars($fila['descripcion']) ?></td>
                    <td><?= htmlspecialchars($fila['fecha']) ?></td>
                    <td><?= htmlspecialchars($fila['prioridad']) ?></td>
                    <td><?= htmlspecialchars($fila['estado']) ?></td>
                    <td>
                        <a href="modificar_tarea.php?id=<?= $fila['id'] ?>">Actualizar</a> <!-- Botón modificar como enlace -->
                    </td>
                    <td>
                        <input type="checkbox" name="eliminar_tareas[]" value="<?= $fila['id'] ?>"> <!-- Checkbox para seleccionar tareas a eliminar -->
                    </td>
                </tr>
            <?php } ?>
        </table>
        <input type="submit" value="Eliminar"> <!-- Botón para enviar los IDs de las tareas a eliminar -->
    </form>

<?php 
} else {
    echo "No hay tareas registradas.";
}

?>

<!--crear tarea-->
<?php

include 'models/conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $prioridad = isset($_POST["prioridad"]) ? $_POST["prioridad"] : "";
    $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
    
    if ($titulo === '' || $descripcion === '' || $fecha === '' || $prioridad === '' || $estado === '') 
    {
        $error = "Por favor, complete todos los campos.";
    } 
    else 
   
         
    {
        // Llama a la función crearTarea() con los datos proporcionados
        $resultado = crearTarea($titulo, $descripcion, $fecha, $prioridad, $estado);
        
        if ($resultado) {
            echo "Tarea creada correctamente.";
        } else {
            echo "Error al crear la tarea.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
</head>
<body>

    <h1>Insertar Tarea</h1>
  

    <form action="crear_tarea.php" method="post">
    <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"></textarea><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required><br>
        <label for="prioridad">Prioridad:</label>
        <select name="prioridad" id="prioridad">
            <option value="alta">Alta</option>
            <option value="media">Media</option>
            <option value="baja">Baja</option>
        </select><br>
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="pendiente">Pendiente</option>
            <option value="completada">Completada</option>
            <option value="aplazada">Aplazada</option>
            <option value="cancelada">Cancelada</option>
        </select><br>
        <button type="submit">Insertar Tarea</button>
    </form>

</body>
</html>

<!--eliminar tarea-->

<?php

include 'models/conexion.php';;

$id_tarea = isset($_POST['id']) ? $_POST['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $consulta = "DELETE FROM tareas WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) {
        $stmt->bind_param("i", $id_tarea);
        if ($stmt->execute()) {
            echo "Tarea eliminada correctamente.";
        } else {
            echo "Error al eliminar la tarea.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM tareas WHERE id=?";
if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("i", $id_tarea);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $titulo = $fila['titulo'];
            $descripcion = $fila['descripcion'];
            $fecha = $fila['fecha'];
            $prioridad = $fila['prioridad'];
            $estado = $fila['estado'];
        } 
        else 
        {
            echo "No se encontró la tarea.";
            exit();
        }
    } 
    else 
    {
        echo "Error al ejecutar la consulta.";
        exit();
    }
    $stmt->close();
} 
else 
{
    echo "Error al preparar la consulta.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Tarea</title>
</head>
<body>

    <h1>Eliminar Tarea</h1>

    <h2>¿Está seguro de que desea eliminar la siguiente tarea?</h2>
    <p><strong>Título:</strong> <?php echo $titulo; ?></p>
    <p><strong>Descripción:</strong> <?php echo $descripcion; ?></p>
    <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
    <p><strong>Prioridad:</strong> <?php echo $prioridad; ?></p>
    <p><strong>Estado:</strong> <?php echo $estado; ?></p>
    
    <form action="eliminar_tarea.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_tarea; ?>">
        <button type="submit">Eliminar Tarea</button>
    </form>

</body>
</html>

<!--modificar tarea -->

<?php

include 'models/core.php';

$id_tarea = isset($_GET['id']) ? $_GET['id'] : '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $titulo_modificado = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $descripcion_modificada = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $fecha_modificada = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $prioridad_modificada = isset($_POST["prioridad"]) ? $_POST["prioridad"] : "";
    $estado_modificado = isset($_POST["estado"]) ? $_POST["estado"] : "";

    
    $consulta = "UPDATE tareas SET titulo=?, descripcion=?, fecha=?, prioridad=?, estado=? WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) 
    {
        $stmt->bind_param("sssssi", $titulo_modificado, $descripcion_modificada, $fecha_modificada, $prioridad_modificada, $estado_modificado, $id_tarea);
        if ($stmt->execute()) 
        {
            echo "Tarea modificada correctamente.";
        } 
        else 
        {
            echo "Error al modificar la tarea.";
        }
        $stmt->close();
    } 
    else 
    {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM tareas WHERE id=?";
if ($stmt = $conexion->prepare($sql)) 
{
    $stmt->bind_param("i", $id_tarea);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $titulo = $fila['titulo'];
            $descripcion = $fila['descripcion'];
            $fecha = $fila['fecha'];
            $prioridad = $fila['prioridad'];
            $estado = $fila['estado'];
        } 
        else 
        {
            echo "No se encontró la tarea.";
            exit();
        }
    } 
    else 
    {
        echo "Error al ejecutar la consulta.";
        exit();
    }
    $stmt->close();
} 
else 
{
    echo "Error al preparar la consulta.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Tarea</title>
</head>
<body>

    <h1>Modificar Tarea</h1>
    
    <form action="modificar_tarea.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $titulo; ?>" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"><?php echo $descripcion; ?></textarea><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>" required><br>
        <label for="prioridad">Prioridad:</label>
        <select name="prioridad" id="prioridad">
            <option value="alta" <?php if ($prioridad == 'alta') echo 'selected'; ?>>Alta</option>
            <option value="media" <?php if ($prioridad == 'media') echo 'selected'; ?>>Media</option>
            <option value="baja" <?php if ($prioridad == 'baja') echo 'selected'; ?>>Baja</option>
        </select><br>
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="pendiente" <?php if ($estado == 'pendiente') echo 'selected'; ?>>Pendiente</option>
            <option value="completada" <?php if ($estado == 'completada') echo 'selected'; ?>>Completada</option>
            <option value="aplazada" <?php if ($estado == 'aplazada') echo 'selected'; ?>>Aplazada</option>
            <option value="cancelada" <?php if ($estado == 'cancelada') echo 'selected'; ?>>Cancelada</option>
        </select><br>
        <input type="hidden" name="id" value="<?php echo $id_tarea; ?>">
        <button type="submit">Modificar Tarea</button>
    </form>

</body>
</html>

<!--listar eventos-->

<?php

include 'models/conexion.php';


$consulta = "SELECT * FROM eventos";
$resultado = mysqli_query($conexion, $consulta);


if (mysqli_num_rows($resultado) > 0) {
    
    echo "<h1>Listado de Eventos</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Descripción</th><th>Fecha de Inicio</th><th>Fecha de Fin</th><th>Ubicación</th></tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila['nombre'] . "</td>";
    echo "<td>" . $fila['descripcion'] . "</td>";
    echo "<td>" . $fila['fecha_inicio'] . "</td>";
    echo "<td>" . $fila['fecha_fin'] . "</td>";
    echo "<td>" . $fila['ubicacion'] . "</td>";
    echo "<td><a href='modificar_evento.php?id=" . $fila['id'] . "'>Modificar</a></td>";
    echo "<td><a href='eliminar_evento.php?id=" . $fila['id'] . "'>Eliminar</a></td>";
    echo "</tr>";
}

    echo "</table>";
} 
else 
{ 
    echo "No hay eventos registrados.";
}

?>
<!--crear evento-->
<?php
include 'models/conexion.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
    $fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : '';
    $ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : '';

    if ($nombre === '' || $fecha_inicio === '') {
        $error = "Por favor, complete todos los campos obligatorios.";
    } else {
        $consulta = "INSERT INTO eventos (nombre, descripcion, fecha_inicio, fecha_fin, ubicacion) VALUES (?, ?, ?, ?, ?)";
        
       
        if ($stmt = $conexion->prepare($consulta)) {
            
            $stmt->bind_param("sssss", $nombre, $descripcion, $fecha_inicio, $fecha_fin, $ubicacion);
            
            if ($stmt->execute()) {
                echo "Evento especial creado correctamente.";
            } else {
               
                echo "Error al crear el evento: " . $conexion->error;
            }
            
            $stmt->close();
        } else {
            // Mostrar mensaje de error de preparación
            echo "Error al preparar la consulta: " . $conexion->error;
        }
    }
} else {
    echo "Acceso denegado.";
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento</title>
</head>
<body>

    <h1>Crear Nuevo Evento</h1>
    
    <form action="crear_evento.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"></textarea><br>
        
        <label for="fecha_inicio">Fecha y Hora de Inicio:</label>
        <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" required><br>
        
        <label for="fecha_fin">Fecha y Hora de Fin:</label>
        <input type="datetime-local" name="fecha_fin" id="fecha_fin"><br>
        
        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacion"><br>
        
        <button type="submit">Crear Evento</button>
    </form>

</body>
</html>

<!--modificarf evento-->
<?php

include 'models/conexion.php';

$id_evento = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nombre_modificado = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $descripcion_modificada = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $fecha_inicio_modificada = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
    $fecha_fin_modificada = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : "";
    $ubicacion_modificada = isset($_POST["ubicacion"]) ? $_POST["ubicacion"] : "";

    $consulta = "UPDATE eventos SET nombre=?, descripcion=?, fecha_inicio=?, fecha_fin=?, ubicacion=? WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) 
    {
        $stmt->bind_param("sssssi", $nombre_modificado, $descripcion_modificada, $fecha_inicio_modificada, $fecha_fin_modificada, $ubicacion_modificada, $id_evento);
        if ($stmt->execute()) 
        {
            echo "Evento modificado correctamente.";
        } 
        else 
        {
            echo "Error al modificar el evento.";
        }
        $stmt->close();
    } 
    else 
    {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM eventos WHERE id=?";
if ($stmt = $conexion->prepare($sql)) 
{
    $stmt->bind_param("i", $id_evento);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $nombre = $fila['nombre'];
            $descripcion = $fila['descripcion'];
            $fecha_inicio = $fila['fecha_inicio'];
            $fecha_fin = $fila['fecha_fin'];
            $ubicacion = $fila['ubicacion'];
        } 
        else 
        {
            echo "No se encontró el evento.";
            exit();
        }
    } 
    else 
    {
        echo "Error al ejecutar la consulta.";
        exit();
    }
    $stmt->close();
} 
else 
{
    echo "Error al preparar la consulta.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Evento</title>
</head>
<body>

    <h1>Modificar Evento</h1>
    
    <form action="modificar_evento.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"><?php echo $descripcion; ?></textarea><br>
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fecha_inicio; ?>" required><br>
        <label for="fecha_fin">Fecha de Finalización:</label>
        <input type="datetime-local" name="fecha_fin" id="fecha_fin" value="<?php echo $fecha_fin; ?>"><br>
        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $ubicacion; ?>" required><br>
        <input type="hidden" name="id" value="<?php echo $id_evento; ?>">
        <button type="submit">Modificar Evento</button>
    </form>

</body>
</html>
<!-- eliminar evento-->
<?php

include 'models/conexion.php';;

$id_evento = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $consulta = "DELETE FROM eventos WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) {
        $stmt->bind_param("i", $id_evento);
        if ($stmt->execute()) {
            echo "Evento eliminado correctamente.";
        } else {
            echo "Error al eliminar el evento.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM eventos WHERE id=?";
if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("i", $id_evento);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $nombre = $fila['nombre'];
            $descripcion = $fila['descripcion'];
            $fecha_inicio = $fila['fecha_inicio'];
            $fecha_fin = $fila['fecha_fin'];
            $ubicacion = $fila['ubicacion'];
        } 
        else 
        {
            echo "No se encontró el evento.";
            exit();
        }
    } 
    else 
    {
        echo "Error al ejecutar la consulta.";
        exit();
    }
    $stmt->close();
} 
else 
{
    echo "Error al preparar la consulta.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Evento</title>
</head>
<body>

    <h1>Eliminar Evento</h1>

    <h2>¿Está seguro de que desea eliminar el siguiente evento?</h2>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Descripción:</strong> <?php echo $descripcion; ?></p>
    <p><strong>Fecha de Inicio:</strong> <?php echo $fecha_inicio; ?></p>
    <p><strong>Fecha de Finalización:</strong> <?php echo $fecha_fin; ?></p>
    <p><strong>Ubicación:</strong> <?php echo $ubicacion; ?></p>
    
    <form action="eliminar_evento.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_evento; ?>">
        <button type="submit">Eliminar Evento</button>
    </form>

</body>
</html>

<!--listas eventos especiales-->$_COOKIE<?php
include 'models/conexion.php';

$consulta = "SELECT * FROM eventosespeciales";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    echo "<h1>Listado de Eventos Especiales</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Fecha</th><th>Tipo</th><th>Notas</th><th>Acciones</th></tr>";

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['fecha'] . "</td>";
        echo "<td>" . $fila['tipo'] . "</td>";
        echo "<td>" . $fila['notas'] . "</td>";
        echo "<td>";
        echo "<a href='modificar_evento_especial.php?id=" . $fila['id'] . "'>Modificar</a> | ";
        echo "<a href='eliminar_evento_especial.php?id=" . $fila['id'] . "'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} 
else 
{
    echo "No hay eventos especiales registrados.";
}

?>
<!--crear evento especial-->
<?php
include 'models/conexion.php';;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
 
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
    $notas = isset($_POST['notas']) ? $_POST['notas'] : '';

    $consulta = "INSERT INTO eventosespeciales (nombre, fecha, tipo, notas) VALUES (?, ?, ?, ?)";
    
    if ($nombre === '' || $fecha === '' || $tipo === '') 
    {
        $error = "Por favor, complete todos los campos.";
    } 

    else 

    {
        $consulta = "INSERT INTO eventosespeciales (nombre, fecha, tipo, notas) VALUES (?, ?, ?, ?)";

        if ($stmt = $conexion->prepare($consulta)) 
        {
            $stmt->bind_param("ssss", $nombre, $fecha, $tipo, $notas);

            if ($stmt->execute()) 
            {
                echo "Evento Especial creado correctamente.";
            } 
            else 
            {
                echo "Error al crear eñ evento.";
            }
            $stmt->close();
        } 
        else 
        {
            $error = "Error al preparar la consulta.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento</title>
</head>
<body>
    <h1>Crear Evento</h1>
    
    <form action="crear_evento_especial.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required><br>
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo">
            <option value="cumpleaños">Cumpleaños</option>
            <option value="aniversario">Aniversario</option>
            <option value="bautizo">Bautizo</option>
            <option value="graduacion">Graduación</option>
            <option value="boda">Boda</option>
            <option value="promocion">Promoción Laboral</option>
            <option value="jubilacion">Jubilación</option>
            <option value="fecha_conmemorativa">Fecha Conmemorativa</option>
            <option value="vacaciones">Vacaciones o Viajes</option>
            <option value="evento_cultural">Evento Cultural</option>
        </select><br>
        <label for="notas">Notas:</label><br>
        <textarea name="notas" id="notas" rows="4" cols="50"></textarea><br>
        <button type="submit">Crear Evento</button>
    </form>

</body>
</html>
<!--modificar evento especial-->
<?php

include 'models/conexion.php';

$id_evento_especial = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nombre_modificado = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $fecha_modificada = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $tipo_modificado = isset($_POST["tipo"]) ? $_POST["tipo"] : "";
    $notas_modificadas = isset($_POST["notas"]) ? $_POST["notas"] : "";

    $consulta = "UPDATE eventosespeciales SET nombre=?, fecha=?, tipo=?, notas=? WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) 
    {
        $stmt->bind_param("ssssi", $nombre_modificado, $fecha_modificada, $tipo_modificado, $notas_modificadas, $id_evento_especial);
        if ($stmt->execute()) 
        {
            echo "Evento especial modificado correctamente.";
        } 
        else 
        {
            echo "Error al modificar el evento especial.";
        }
        $stmt->close();
    } 
    else 
    {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM eventosespeciales WHERE id=?";
if ($stmt = $conexion->prepare($sql)) 
{
    $stmt->bind_param("i", $id_evento_especial);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $nombre = $fila['nombre'];
            $fecha = $fila['fecha'];
            $tipo = $fila['tipo'];
            $notas = $fila['notas'];
        } 
        else 
        {
            echo "No se encontró el evento especial.";
            exit();
        }
    } 
    else 
    {
        echo "Error al ejecutar la consulta.";
        exit();
    }
    $stmt->close();
} 
else 
{
    echo "Error al preparar la consulta.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Evento Especial</title>
</head>
<body>

    <h1>Modificar Evento Especial</h1>
    
    <form action="modificar_evento_especial.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" required><br>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>" required><br>
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="cumpleaños" <?php if ($tipo === 'cumpleaños') echo 'selected'; ?>>Cumpleaños</option>
            <option value="aniversario" <?php if ($tipo === 'aniversario') echo 'selected'; ?>>Aniversario</option>
            <!-- Agrega aquí más opciones de tipos de evento -->
        </select><br>
        <label for="notas">Notas:</label><br>
        <textarea name="notas" id="notas" rows="4" cols="50"><?php echo $notas; ?></textarea><br>
        <input type="hidden" name="id" value="<?php echo $id_evento_especial; ?>">
        <button type="submit">Modificar Evento Especial</button>
    </form>

</body>
</html>
<!--eliminar evento especial-->
<?php

include 'models/conexion.php';;

$id_evento_especial = isset($_GET['id']) ? $_GET['id'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $consulta = "DELETE FROM eventosespeciales WHERE id=?";
    if ($stmt = $conexion->prepare($consulta)) 
    {
        $stmt->bind_param("i", $id_evento_especial);
        if ($stmt->execute()) 
        {
            echo "Evento especial eliminado correctamente.";
        } 
        else 
        {
            echo "Error al eliminar el evento especial.";
        }
        $stmt->close();
    } 
    else 
    {
        echo "Error al preparar la consulta.";
    }
}

$sql = "SELECT * FROM eventosespeciales WHERE id=?";
if ($stmt = $conexion->prepare($sql)) {
    $stmt->bind_param("i", $id_evento_especial);
    if ($stmt->execute()) 
    {
        $resultado = $stmt->get_result();
        if ($resultado->num_rows == 1) 
        {
            $fila = $resultado->fetch_assoc();
            $nombre = $fila['nombre'];
            $fecha = $fila['fecha'];
            $tipo = $fila['tipo'];
            $notas = $fila['notas'];
        } 
        else 
        {
            echo "No se encontró el evento especial.";
            exit();
        }
    } 
    else 
    {
        echo "Error al ejecutar la consulta.";
        exit();
    }
    $stmt->close();
} 
else 
{
    echo "Error al preparar la consulta.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Evento Especial</title>
</head>
<body>

    <h1>Eliminar Evento Especial</h1>

    <h2>¿Está seguro de que desea eliminar el siguiente evento especial?</h2>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
    <p><strong>Tipo:</strong> <?php echo $tipo; ?></p>
    <p><strong>Notas:</strong> <?php echo $notas; ?></p>
    
    <form action="eliminar_evento_especial.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id_evento_especial; ?>">
        <button type="submit">Eliminar Evento Especial</button>
    </form>

</body>
</html>

<!--historial habitos-->
<?php
include 'models/conexion.php';
include "funcion_habitos.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar_historial'])) {
    // Recorrer cada hábito del usuario
    foreach ($habitos_usuario as $habito) {
        // Recorrer cada día del calendario
        foreach ($calendario as $dia => $nombre_dia) {
            // Construir el nombre del checkbox correspondiente a este hábito y día
            $nombre_checkbox = "habito_" . $habito['id'] . "_dia_" . $dia;
            
            // Verificar si el checkbox está marcado
            if (isset($_POST[$nombre_checkbox]) && $_POST[$nombre_checkbox] == 'on') {
                // Guardar el historial del hábito marcado en la base de datos
                $consulta = "INSERT INTO historicohabitos (id_habito, fecha, completado) VALUES (?, ?, 1)";
                $stmt = $conexion->prepare($consulta);
                if ($stmt) {
                    $stmt->bind_param("is", $habito['id'], $dia);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    echo "Error al preparar la consulta: " . $conexion->error;
                }
            }
        }
    }

    // Mostrar mensaje de éxito
    echo "El historial de hábitos se ha guardado correctamente.";
}
?>

<!--habitos tracker-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Intervalo de Fechas</title>
    <!-- Incluir el script de jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Incluir el script de jQuery UI para el calendario -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Script personalizado para el calendario -->
    <script>
        $(function() {
            // Inicializar el selector de fecha
            $("#fechaInicio, #fechaFin").datepicker({
                dateFormat: 'yy-mm-dd', // Formato de fecha (año-mes-día)
                changeMonth: true, // Permitir cambio de mes
                changeYear: true, // Permitir cambio de año
                onSelect: function(selectedDate) {
                    // Cuando se selecciona una fecha en el campo de fecha de inicio,
                    // actualiza la fecha mínima del campo de fecha de fin para que no sea anterior a la fecha de inicio
                    var option = this.id == "fechaInicio" ? "minDate" : "maxDate";
                    var instance = $(this).data("datepicker");
                    var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                    $("#fechaFin").datepicker("option", option, date);
                }
            });
        });
    </script>
</head>
<body>
    <h2>Seleccionar Intervalo de Fechas</h2>
    <form action="procesar_habitos_tracker.php" method="POST">
        <!-- Selector de fecha para la fecha de inicio -->
        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="text" id="fechaInicio" name="fechaInicio"><br>

        <!-- Selector de fecha para la fecha de fin -->
        <label for="fechaFin">Fecha de Fin:</label>
        <input type="text" id="fechaFin" name="fechaFin"><br>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Ver Historial</button>
    </form>
</body>
</html>

<!-- mysql-->

<?php

class MySQL
{
    public $datos; // Array de datos
    public $query = '';
    public $ultimoId = '';
    private $error = ''; // Variable para almacenar mensajes de error

    public function __construct($consulta)
    {
        if (!empty($consulta)) {
            $this->query = $consulta;
            $conexion = mysqli_connect("localhost", "root", "", "innersync");

            if (!$conexion) {
                die("Error en la conexión: " . mysqli_connect_error());
            }

            $salida = mysqli_query($conexion, $consulta);
            $this->ultimoId = mysqli_insert_id($conexion);

            // Verificar si ocurrió un error durante la ejecución de la consulta
            if (mysqli_error($conexion)) {
                $this->error = mysqli_error($conexion);
            } else {
                if (substr($consulta, 0, 6) == "SELECT") {
                    while ($fila = mysqli_fetch_array($salida, MYSQLI_BOTH)) // Leer dato a dato el resultado
                    {
                        $this->datos[] = $fila;
                    }
                }
            }
            mysqli_close($conexion);
        }
    }

    public function getItem($fila, $col)
    {
        (isset($this->datos[$fila][$col])) ? $ret = $this->datos[$fila][$col] : $ret = "";
        return $ret;
    }

    public function getFilas()
    {
        (isset($this->datos)) ? $ret = count($this->datos) : $ret = 0;
        return $ret;
    }

    public function getColumnas($fila)
    {
        return count($this->datos[$fila]);
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getUltimoId()
    {
        return $this->ultimoId;
    }

    public function getError()
    {
        return $this->error;
    }
}

?>

<!--mood_tracker-->
<?php
include 'models/core.php'; 

$estadosAnimo = obtenerMood();

if (empty($estadosAnimo)) {
    echo "Error al obtener los estados de ánimo o no hay datos disponibles.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker</title>
</head>
<body>
    <h2>¿Cómo te sientes hoy?</h2>
    <form action="guardar_mood.php" method="POST">
        <select name="estado_animo">
            <?php while ($fila = $resultado->fetch_assoc()) : ?>
                <option value="<?php echo $fila['estado_animo']; ?>"><?php echo $fila['estado_animo']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

<?php
include 'models/conexion.php'; 

$consulta = "SELECT DISTINCT estado_animo FROM moodtracker"; 
$resultado = $conexion->query($consulta);

if (!$resultado) {
    echo "Error al obtener los estados de ánimo: " . $conexion->error;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker</title>
</head>
<body>
    <h2>¿Cómo te sientes hoy?</h2>
    <form action="guardar_mood.php" method="POST">
        <select name="estado_animo">
            <?php while ($fila = $resultado->fetch_assoc()) : ?>
                <option value="<?php echo $fila['estado_animo']; ?>"><?php echo $fila['estado_animo']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

<!--dash_container-->
document.addEventListener("DOMContentLoaded", function () {
    // Obtener referencia al contenedor del dashboard
    var dashboardContainer = document.querySelector('.dashboard-container');

    // Obtener referencia a todos los enlaces del menú
    var menuLinks = document.querySelectorAll('#menu a');

    // Agregar evento clic a cada enlace del menú
    menuLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            // Prevenir el comportamiento predeterminado del enlace
            event.preventDefault();

            // Obtener la URL del enlace
            var url = this.getAttribute('href');

            // Realizar una solicitud AJAX para cargar el contenido de la URL
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Colocar el contenido en el contenedor del dashboard
                    dashboardContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    });
});
?>

<!--modificar tarea -->

$("#modificarTarea").submit(function(e) {
    e.preventDefault();
    console.log("Formulario de modificación enviado");
    $.ajax({
        url: "models/modificarTarea.php",
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#botonActualizar").prop("disabled", true);
        },
        error: function(respuesta) {
            let tipo = "error";
            let desc = "";
            switch(respuesta.status) {
                case 400:
                    desc = "Todos los campos son obligatorios.";
                    break;
                case 500:
                    desc = "Ocurrió un error interno en el servidor. Inténtalo de nuevo más tarde.";
                    break;
                default:
                    desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                    break;
            }
            Swal.fire('Error al modificar la tarea', desc, tipo);
        },
        complete: function() {
            $("#botonActualizar").prop("disabled", false);
        },
    });
});

<!--modificarTarea-->
<?php
include 'core.php';


// Se recoge el id del form de mostrar tareas
$id_tarea = isset($_POST["id"]) ? $_POST["id"] : "";


$tarea = obtenerTareaPorId($id_tarea);
print_r($tarea);

if ($tarea) {
    $titulo = $tarea['titulo'];
    $descripcion = $tarea['descripcion'];
    $fecha = $tarea['fecha'];
    $prioridad = $tarea['prioridad'];
    $estado = $tarea['estado'];
} else {
    echo "<p>No se encontró la tarea.</p>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Tarea</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="modal fade" id="modificarTareaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificar Tarea</h4>
            </div>
            <div class="modal-body">
                <form id="modificarTareaForm">
                    <input type="hidden" name="id" value="<?= $id_tarea; ?>">
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="<?= $titulo; ?>">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="4"><?= $descripcion; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="<?= $fecha; ?>">
                    </div>
                    <div class="form-group">
                        <label for="prioridad">Prioridad:</label>
                        <select name="prioridad" id="prioridad" class="form-control">
                            <option value="alta" <?= ($prioridad == 'alta') ? 'selected' : ''; ?>>Alta</option>
                            <option value="media" <?= ($prioridad == 'media') ? 'selected' : ''; ?>>Media</option>
                            <option value="baja" <?= ($prioridad == 'baja') ? 'selected' : ''; ?>>Baja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="pendiente" <?= ($estado == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                            <option value="completada" <?= ($estado == 'completada') ? 'selected' : ''; ?>>Completada</option>
                            <option value="aplazada" <?= ($estado == 'aplazada') ? 'selected' : ''; ?>>Aplazada</option>
                            <option value="cancelada" <?= ($estado == 'cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Modificar Tarea</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--<script src="js/jquery.min.js?<?=date("YmdHis");?>"></script>
script src="bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>-->
<script src="../js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>

<!--ver tareas-->
<?php
include 'models/core.php';

$tareas = obtenerTareas();

if ($tareas) { ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Lista de Tareas</h4>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <th><input type="checkbox" id="checkall" /></th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php foreach ($tareas as $tarea) { ?>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td><?= htmlspecialchars($tarea['titulo']) ?></td>
                            <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
                            <td><?= htmlspecialchars($tarea['fecha']) ?></td>
                            <td><?= htmlspecialchars($tarea['prioridad']) ?></td>
                            <td><?= htmlspecialchars($tarea['estado']) ?></td>
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Editar">
                            <button type="button" class="btn btn-primary btn-xs editar-tarea" data-id="<?= $tarea['id'] ?>" data-title="Editar" data-toggle="modal" data-target="#modificarTareaModal">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            </p>

                            </td>
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Eliminar">
                            <form class="eliminarTarea" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $tarea['id'] ?>">
                            <button type="button" class="btn btn-danger btn-xs eliminar-tarea" data-title="Eliminar" data-toggle="modal" data-target="#delete">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                            </form>
                            </p>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal de eliminación -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Eliminar Tarea</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Estás seguro de que deseas eliminar esta tarea?</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success eliminar-confirmar"><span class="glyphicon glyphicon-ok-sign"></span> Sí</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
    </div>
</div>

<!--<script src="js/jquery.min.js?<?=date("YmdHis");?>"></script>
<script src="bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>-->
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>
</html>

<?php 
} else {
    echo "No hay tareas registradas.";
}
?>

<br><a href="dashboard.php">Volver</a><br>
<a href="models/crearTarea.php">Crear tarea</a><br>
<!--ver eventos-->

<?php
include '../models/core.php';

$eventos = obtenerEventos();

if ($eventos) { ?>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Lista de Eventos</h4>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <th><input type="checkbox" id="checkall" /></th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Ubicación</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php foreach ($eventos as $evento) { ?>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td id="nombre-evento-<?=$evento['id'];?>"><?= htmlspecialchars($evento['nombre']) ?></td>
                            <td id="descripcion-evento-<?=$evento['id'];?>"><?= htmlspecialchars($evento['descripcion']) ?></td>
                            <td id="fecha-inicio-evento-<?=$evento['id'];?>"><?= htmlspecialchars($evento['fecha_inicio']) ?></td>
                            <td id="fecha-fin-evento-<?=$evento['id'];?>"><?= htmlspecialchars($evento['fecha_fin']) ?></td>
                            <td id="ubicacion-evento-<?=$evento['id'];?>"><?= htmlspecialchars($evento['ubicacion']) ?></td>
                            <!--<td>
                                <p data-placement="top" data-toggle="tooltip" title="Editar">
                                    <form class="editarEvento" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
                                        <button type="submit" class="btn btn-primary btn-xs editar-evento" data-title="Editar">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </form>
                                </p>
                            </td>-->
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Editar">
                                <button type="button" class="btn btn-primary btn-xs editar-evento" onclick="editarEvento(<?= $evento['id'] ?>)" data-id="<?= $evento['id'] ?>" data-title="Editar" data-toggle="modal" data-target="#modificarEventoModal">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </p>
                            </td>
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Eliminar">
                            <form class="eliminarEvento" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $evento['id'] ?>">
                            <button type="button" id="botonEliminarEvento" class="btn btn-danger btn-xs eliminar-evento" data-title="Eliminar" data-toggle="modal" data-target="#deleteEvento">
                                    <i class="fa-solid fa-trash-alt"></i>
                            </button>
                            </form>
                            </p>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 <!-- Modal para Modificar Evento -->
 <div class="modal fade" id="modificarEventoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- El contenido dinámico se cargará aquí desde modificarTarea.php -->
            </div>
        </div>
    </div>
</div>

<!-- Modal de eliminación de eventos -->
<div class="modal fade" id="deleteEvento" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Eliminar Evento</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Estás seguro de que deseas eliminar este evento?</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success eliminar-confirmar-evento"><span class="glyphicon glyphicon-ok-sign"></span> Sí</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
    </div>
</div>




<?php 
} else {
    echo "No hay eventos registrados.";
}
?>

<br><a href="../dashboard.php">Volver</a><br>
<a href="crearEvento.php">Crear evento</a><br>

<script src="../js/jquery.min.js?<?=date("YmdHis");?>"></script>
<script src="../bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--ver enventos-->
<?php
include '../models/core.php';

$eventos = obtenerEventos();

if ($eventos) { ?>



<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>Lista de Eventos</h4>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <th><input type="checkbox" id="checkall" /></th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Ubicación</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php foreach ($eventos as $evento) { ?>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td><?= htmlspecialchars($evento['nombre']) ?></td>
                            <td><?= htmlspecialchars($evento['descripcion']) ?></td>
                            <td><?= htmlspecialchars($evento['fecha_inicio']) ?></td>
                            <td><?= htmlspecialchars($evento['fecha_fin']) ?></td>
                            <td><?= htmlspecialchars($evento['ubicacion']) ?></td>
                            <!--<td>
                                <p data-placement="top" data-toggle="tooltip" title="Editar">
                                    <form class="editarEvento" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
                                        <button type="submit" class="btn btn-primary btn-xs editar-evento" data-title="Editar">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </form>
                                </p>
                            </td>-->
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Editar">
                                <button type="button" class="btn btn-primary btn-xs editar-evento" data-id="<?= $evento['id'] ?>" data-title="Editar" data-toggle="modal" data-target="#modificarEventoModal">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </p>
                            </td>
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Eliminar">
                            <form class="eliminarEvento" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $evento['id'] ?>">
                            <button type="button" id="botonEliminarEvento" class="btn btn-danger btn-xs eliminar-evento" data-title="Eliminar" data-toggle="modal" data-target="#deleteEvento">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                            </form>
                            </p>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 <!-- Modal para Modificar Evento -->
 <div class="modal fade" id="modificarEventoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- El contenido dinámico se cargará aquí desde modificarTarea.php -->
            </div>
        </div>
    </div>
</div>

<!-- Modal de eliminación de eventos -->
<div class="modal fade" id="deleteEvento" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Eliminar Evento</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Estás seguro de que deseas eliminar este evento?</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success eliminar-confirmar-evento"><span class="glyphicon glyphicon-ok-sign"></span> Sí</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
    </div>
</div>




<?php 
} else {
    echo "No hay eventos registrados.";
}
?>

<br><a href="../dashboard.php">Volver</a><br>
<a href="crearEvento.php">Crear evento</a><br>
