<?php

include 'mysql.php';
include '../PHPMailer/Exception.php';
include '../PHPMailer/PHPMailer.php';
include '../PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarEmail($asunto,$mensaje,$destinatarios) {
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->SMTPAuth = _SMTP_AUTENTICAR_;
    $mail->SMTPSecure = _SMTP_SEGURIDAD_;
    $mail->Host = _SMTP_SERVIDOR_; 
    $mail->Username = _SMTP_USUARIO_; 
    $mail->Password = _SMTP_CONTRASEÑA_;
    $mail->Port = _SMTP_PUERTO_; 
    $mail->setFrom(_REMITENTE_EMAIL_, _NOMBRE_REMITENTE_EMAIL_);
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';

    foreach($destinatarios as $destinatario => $val) {
        $ocultos ? $mail->addBCC($val) : $mail->addAddress($val);
    }
    
    $mail->IsHTML(true);
    $mail->Subject = $asunto;
    $mail->Body = $mensaje; 
    $result = $mail->Send();
} 


function comprobarLogin($usuario)
{
    $consulta="Select * from usuarios where usuario=$usuario";
    $resultado = new MySQL($consulta);
    if ($resultado->getFilas()) {
        return true;
    } else {
        return false;
    }
}

function cambiarPassword($usuario, $nuevaPass){
    $passwordHash  = password_hash($nuevaPass,PASSWORD_BCRYPT);    
    $consulta = "UPDATE usuarios SET password = '".$passwordHash."' WHERE email = '{$usuario}'";
    $query = new MySQL($consulta);
}

function crearTarea($titulo, $descripcion, $fecha, $prioridad, $estado) {
   
    $consulta = "INSERT INTO tareas (titulo, descripcion, fecha, prioridad, estado) VALUES ('$titulo', '$descripcion', '$fecha', '$prioridad', '$estado')";
    $resultado = new MySQL($consulta);
    return $resultado;
}

function obtenerTareas() {
    $consulta = "SELECT * FROM tareas";
    $resultado = new MySQL($consulta);
    return $resultado->datos;
}

function obtenerTareaPorId($id_tarea) {
    $consulta = "SELECT * FROM tareas WHERE id = " . intval($id_tarea) . " LIMIT 1"; // Usa intval para asegurar que el ID es un número
    $resultado = new MySQL($consulta);
    if ($resultado->getFilas() == 1) {
        return $resultado->datos[0]; // Devuelve la primera fila encontrada
    } else {
        return false; // No se encontró la tarea
    }
}

function eliminarTarea($id_tarea) {
    // Consulta SQL para eliminar la tarea con el ID especificado
    $consulta = "DELETE FROM tareas WHERE id = $id_tarea";
    
    // Ejecutar la consulta y obtener el resultado
    $resultado = new MySQL($consulta);
    
    // Verificar si se realizó correctamente
    if ($resultado->getError()) {
        // Error al ejecutar la consulta, mostrar mensaje de error
        echo "Error al eliminar la tarea con ID: $id_tarea. Detalles: " . $resultado->getError();
        return false;
    } else {
        // La tarea se eliminó correctamente, devolver verdadero
        return true;
    }
}

function modificarTarea($id_tarea, $titulo, $descripcion, $fecha, $estado, $prioridad) {
    $consulta = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion', fecha = '$fecha', estado = '$estado', prioridad = '$prioridad' WHERE id = '$id_tarea'";
    //echo "Consulta SQL: $consulta<br>"; // Mensaje de depuración
    $resultado = new MySQL($consulta);
    if ($resultado->getError()) {
        echo "Error al ejecutar la consulta: " . $resultado->getError() . "<br>";
        return false; // Devolver false si hay un error
    }
    else {
        return true; // Devolver true si la consulta se ejecuta correctamente
    }
}



function crearEvento($nombre, $descripcion, $fecha_inicio, $fecha_fin, $ubicacion) {
    $consulta = "INSERT INTO eventos (nombre, descripcion, fecha_inicio, fecha_fin, ubicacion) VALUES ('$nombre', '$descripcion', '$fecha_inicio', '$fecha_fin', '$ubicacion')";
    $resultado = new MySQL($consulta);
    return $resultado;
}

function obtenerEventos() {
    $consulta = "SELECT * FROM eventos";
    $resultado = new MySQL($consulta);
    return $resultado->datos;
}

function obtenerEventoPorId($id_evento) {
    $consulta = "SELECT * FROM eventos WHERE id = " . intval($id_evento) . " LIMIT 1";
    $resultado = new MySQL($consulta);
    if ($resultado->getFilas() == 1) {
        return $resultado->datos[0];
    } else {
        return false;
    }
}

function eliminarEvento($id_evento) {
    $consulta = "DELETE FROM eventos WHERE id = $id_evento";
    $resultado = new MySQL($consulta);
    if ($resultado->getError()) {
        echo "Error al eliminar el evento con ID: $id_evento. Detalles: " . $resultado->getError();
        return false;
    } else {
        return true;
    }
}

function modificarEvento($id_evento, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $ubicacion) {
    $consulta = "UPDATE eventos SET nombre = '$nombre', descripcion = '$descripcion', fecha_inicio = '$fecha_inicio', fecha_fin = '$fecha_fin', ubicacion = '$ubicacion' WHERE id = '$id_evento'";
    $resultado = new MySQL($consulta);
    if ($resultado->getError()) {
        echo "Error al ejecutar la consulta: " . $resultado->getError();
        return false;
    } else {
        return true;
    }
}

function crearEventoEspecial($nombre, $fecha, $tipo, $notas) {
    $consulta = "INSERT INTO eventosespeciales (nombre, fecha, tipo, notas) VALUES ('$nombre', '$fecha', '$tipo', '$notas')";
    $resultado = new MySQL($consulta);
    return $resultado;
}

function obtenerEventosEspeciales() {
    $consulta = "SELECT * FROM eventosespeciales";
    $resultado = new MySQL($consulta);
    return $resultado->datos;
}

function obtenerEventoEspecialPorId($id_evento) {
    $consulta = "SELECT * FROM eventosespeciales WHERE id = " . intval($id_evento) . " LIMIT 1";
    $resultado = new MySQL($consulta);
    if ($resultado->getFilas() == 1) {
        return $resultado->datos[0];
    } else {
        return false;
    }
}

function eliminarEventoEspecial($id_evento) {
    $consulta = "DELETE FROM eventosespeciales WHERE id = $id_evento";
    $resultado = new MySQL($consulta);
    if ($resultado->getError()) {
        echo "Error al eliminar el evento especial con ID: $id_evento. Detalles: " . $resultado->getError();
        return false;
    } else {
        return true;
    }
}


function modificarEventoEspecial($id_evento, $nombre, $fecha, $tipo, $notas) {
    $consulta = "UPDATE eventosespeciales SET nombre = '$nombre', fecha = '$fecha', tipo = '$tipo', notas = '$notas' WHERE id = '$id_evento'";
    $resultado = new MySQL($consulta);
    if ($resultado->getError()) {
        echo "Error al ejecutar la consulta: " . $resultado->getError();
        return false;
    } else {
        return true;
    }
}

function obtenerHabitosPredefinidos() {
    $consulta = "SELECT id, nombre, descripcion FROM habitospredefinidos";
    $mysql = new MySQL($consulta);
    
    if ($mysql->getError()) {
        echo "Error al obtener hábitos predefinidos: " . $mysql->getError();
        return array();  // Retorna un array vacío en caso de error
    } else {
        return $mysql->datos;  // Retorna los datos obtenidos
    }
}

function obtenerHabitosActivos() {
    $consulta = "SELECT id, nombre, descripcion FROM habitos WHERE activo = 1";
    //echo "Consulta SQL: <pre>$consulta</pre>";
    $mysql = new MySQL($consulta);
     //echo "Datos Obtenidos:<pre>";
     //print_r($mysql->datos);
     //echo "</pre>";
    if ($mysql->getError()) {
        echo "Error al obtener hábitos del usuario: " . $mysql->getError();
        return array();  // Retorna un array vacío en caso de error
    } else {
        return $mysql->datos;  // Retorna los datos obtenidos
    }
}

function obtenerNombreHabito($habito_id) {
    $consulta = "SELECT nombre FROM habitospredefinidos WHERE id = $habito_id";
    $mysql = new MySQL($consulta);
    
    if ($mysql->getError()) {
        echo "Error al obtener el nombre del hábito: " . $mysql->getError();
        return null;
    } else {
        return $mysql->getItem(0, 'nombre');
    }
}

function obtenerDescripcionHabito($habito_id) {
    $consulta = "SELECT descripcion FROM habitospredefinidos WHERE id = $habito_id";
    $mysql = new MySQL($consulta);
    
    if ($mysql->getError()) {
        echo "Error al obtener la descripción del hábito: " . $mysql->getError();
        return null;
    } else {
        return $mysql->getItem(0, 'descripcion');
    }
}

function insertarHabito($nombre, $descripcion) {
    $consulta = "INSERT INTO habitos (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
    $mysql = new MySQL($consulta);

    if ($mysql->getError()) {
        echo "Error al insertar el hábito: " . $mysql->getError();
        return false;
    } else {
        return true;
    }
}

function insertarHistoricoHabito($id_habito) {
    $fecha = date('Y-m-d'); // Obtiene la fecha actual en el formato YYYY-MM-DD
    $consulta = "INSERT INTO historicohabitos (id_habito, fecha) VALUES ('$id_habito', '$fecha')";
    error_log("Consulta SQL: $consulta");

    $mysql = new MySQL($consulta);

    if ($mysql->getError()) {
        // Registro del error específico
        error_log("Error en la consulta SQL: " . $mysql->getError());
        echo "Error al insertar el historial del hábito: " . $mysql->getError();
        return false;
    } else {
        return true;
    }
}

function marcarHabitoInactivo($id) {
    $consulta = "UPDATE habitos SET activo = 0 WHERE id = '$id'";
    $resultado = new MySQL($consulta);
    
    if ($resultado->getError()) {
        echo "Error al marcar el hábito como inactivo con ID: $id. Detalles: " . $resultado->getError();
        return false;
    } else {
        return true;
    }
}

function obtenerCalendario($num_dias = 5) {
    $calendario = [];
    $fecha_actual = strtotime('today');
    
    // Dos días antes de hoy
    for ($i = -2; $i <= 2; $i++) {
        $fecha = strtotime("$i day", $fecha_actual);
        $dia = date('Y-m-d', $fecha);
        $calendario[$dia] = date('d/m', $fecha);
    }

    return $calendario;
}


function obtenerHistorialHabitosPorFecha($fechaInicio, $fechaFin) {
  
    $consulta = "SELECT historicohabitos.id, historicohabitos.id_habito, habitos.nombre, historicohabitos.fecha
    FROM historicohabitos 
    LEFT JOIN habitos ON historicohabitos.id_habito = habitos.id
    WHERE historicohabitos.fecha BETWEEN '{$fechaInicio}' AND '{$fechaFin}'
    ORDER BY historicohabitos.fecha DESC";

    "Consulta SQL: <pre>$consulta</pre>";
  
    $mysql = new MySQL($consulta);

    if ($mysql->getError()) {
       
        error_log("Error al obtener el historial de hábitos: " . $mysql->getError());
        return [];
    }

    return $mysql->datos;
}


function obtenerMood() {

    $consulta = "SELECT DISTINCT estado_animo FROM moodtracker";
    //echo "Consulta SQL: <pre>$consulta</pre>";
    $mysql = new MySQL($consulta);

    if ($mysql->getError()) {
       
        error_log("Error al obtener el historial de hábitos: " . $mysql->getError());
        return [];
    }
    return $mysql->datos;
}

function obtenerEstadoAnimo() {
    // Realizar la consulta SQL
    $consulta = "SELECT DISTINCT estado_animo FROM moodtracker";
    $query = new MySQL($consulta);

    // Verificar si se está ejecutando la consulta correctamente
    if (!$query) {
        echo "Error al ejecutar la consulta SQL.";
        return;
    }

    // Generar las opciones de selección
    $opciones = '<option value="" selected disabled>- Selecciona estado de ánimo -</option>';
    for ($i = 0; $i < $query->getFilas(); $i++) {
        $estado_animo = htmlspecialchars($query->getItem($i, 0)); // Evitar ataques de inyección HTML
        $opciones .= '<option value="' . $estado_animo . '">' . $estado_animo . '</option>';
    }

    // Devolver las opciones generadas
    echo $opciones;
}

function eliminarHabito($id) {
    $consulta = "UPDATE habitos SET activo = 0 WHERE id = '$id'";
    $resultado = new MySQL($consulta);
    
    // Verificar si se realizó correctamente
    if ($resultado->getError()) {
        // Error al ejecutar la consulta, mostrar mensaje de error
        echo "Error al eliminar el habito con ID: $id. Detalles: " . $resultado->getError();
        return false;
    } else {
        // El habito se eliminó correctamente, devolver verdadero
        return true;
    }
}

function insertarEstadoAnimo($estado_animo) {
    
    $consulta = "INSERT INTO historialmood (estado_animo, fecha) VALUES ('$estado_animo', CURDATE())";
    $mysql = new MySQL($consulta);
    if ($mysql->getError()) {
        echo "Error al insertar el estado de ánimo: " . $mysql->getError();
        return false;
    } else {
        return true; 
    }
}

    function obtenerHistorialEstadosAnimoPorFecha($fechaInicio, $fechaFin) {
        $consulta = "SELECT id, estado_animo, fecha
                     FROM historialmood
                     WHERE fecha BETWEEN '{$fechaInicio}' AND '{$fechaFin}'
                     ORDER BY fecha DESC";
    
        $mysql = new MySQL($consulta);
    
        if ($mysql->getError()) {
            error_log("Error al obtener el historial de estados de ánimo: " . $mysql->getError());
            return [];
        }
    
        return $mysql->datos;
    }
    
    function obtenerNombreUsuario() {
        if (isset($_COOKIE['usuario'])) {
           
            $emailDecodificado = base64_decode($_COOKIE['usuario']);
            $consultaNombre = new MySQL("SELECT nombre FROM usuarios WHERE email = '{$emailDecodificado}'");
            if ($consultaNombre->getFilas()) {
                return $consultaNombre->getItem(0, 'nombre');
            } else {
                return "Consulta no devuelve filas"; 
            }
        } else {
            return "Cookie 'usuario' no establecida"; 
        }
    }