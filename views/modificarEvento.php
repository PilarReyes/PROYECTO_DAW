<?php
include '../models/core.php';

// Se recoge el id del evento desde el formulario de mostrar eventos
$id_evento = isset($_POST["id"]) ? $_POST["id"] : "";

$evento = obtenerEventoPorId($id_evento);

if ($evento) {
    $nombre = $evento['nombre'];
    $descripcion = $evento['descripcion'];
    $fecha_inicio = $evento['fecha_inicio'];
    $fecha_fin = $evento['fecha_fin'];
    $ubicacion = $evento['ubicacion'];

    echo '
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Evento</h4>
    </div>
    <div class="modal-body">
        <form id="modificarEvento">
            <input type="hidden" name="id" value="' . $id_evento . '">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="' . htmlspecialchars($nombre) . '">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4">' . htmlspecialchars($descripcion) . '</textarea>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control" value="' . date('Y-m-d\TH:i', strtotime($fecha_inicio)) . '">
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin:</label>
                <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control" value="' . date('Y-m-d\TH:i', strtotime($fecha_fin)) . '">
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="' . htmlspecialchars($ubicacion) . '">
            </div>
            <button type="submit" id="botonActualizar" class="btn btn-primary">Modificar Evento</button>
        </form>
    </div>
    ';

   
} else {
    echo "<p>No se encontró el evento.</p>";
    exit;
}
?>
