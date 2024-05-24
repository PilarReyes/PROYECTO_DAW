<?php
include '../models/core.php';

// Se recoge el id de la fecha especial desde el formulario de mostrar fechas especiales
$id_fecha_especial = isset($_POST["id"]) ? $_POST["id"] : "";

$fechaEspecial = obtenerEventoEspecialPorId($id_fecha_especial);

if ($fechaEspecial) {
    $nombre = $fechaEspecial['nombre'];
    $fecha = $fechaEspecial['fecha'];
    $tipo = $fechaEspecial['tipo'];
    $notas = $fechaEspecial['notas'];

    echo '
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Fecha Especial</h4>
    </div>
    <div class="modal-body">
        <form id="modificarFechaEspecial">
            <input type="hidden" name="id" value="' . $id_fecha_especial . '">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="' . htmlspecialchars($nombre) . '">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="' . date('Y-m-d', strtotime($fecha)) . '">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="cumpleaños"' . ($tipo == 'cumpleaños' ? ' selected' : '') . '>Cumpleaños</option>
                    <option value="aniversario"' . ($tipo == 'aniversario' ? ' selected' : '') . '>Aniversario</option>
                </select>
            </div>
            <div class="form-group">
                <label for="notas">Notas:</label>
                <textarea name="notas" id="notas" class="form-control" rows="4">' . htmlspecialchars($notas) . '</textarea>
            </div>
            <button type="submit" id="botonActualizar" class="btn btn-primary">Modificar Fecha Especial</button>
        </form>
    </div>
    ';



} else {
    echo "<p>No se encontró la fecha especial.</p>";
    exit;
}
?>
