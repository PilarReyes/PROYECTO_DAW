<?php
include '../models/core.php';

// Se recoge el id del form de mostrar tareas
$id_tarea = isset($_POST["id"]) ? $_POST["id"] : "";

$tarea = obtenerTareaPorId($id_tarea);

if ($tarea) {
    $titulo = $tarea['titulo'];
    $descripcion = $tarea['descripcion'];
    $fecha = $tarea['fecha'];
    $prioridad = $tarea['prioridad'];
    $estado = $tarea['estado'];
  
    echo '
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Tarea</h4>
    </div>
    <div class="modal-body">
        <form id="modificarTarea">
            <input type="hidden" name="id" value="' . $id_tarea . '">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="' . $titulo . '">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4">' . $descripcion . '</textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="' . $fecha . '">
            </div>
            <div class="form-group">
                <label for="prioridad">Prioridad:</label>
                <select name="prioridad" id="prioridad" class="form-control">
                    <option value="alta" ' . ($prioridad == 'alta' ? 'selected' : '') . '>Alta</option>
                    <option value="media" ' . ($prioridad == 'media' ? 'selected' : '') . '>Media</option>
                    <option value="baja" ' . ($prioridad == 'baja' ? 'selected' : '') . '>Baja</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="pendiente" ' . ($estado == 'pendiente' ? 'selected' : '') . '>Pendiente</option>
                    <option value="completada" ' . ($estado == 'completada' ? 'selected' : '') . '>Completada</option>
                    <option value="aplazada" ' . ($estado == 'aplazada' ? 'selected' : '') . '>Aplazada</option>
                    <option value="cancelada" ' . ($estado == 'cancelada' ? 'selected' : '') . '>Cancelada</option>
                </select>
            </div>
            <button type="submit" id="botonActualizar" class="btn btn-primary">Modificar Tarea</button>
        </form>
    </div>
    ';

} else {
    echo "<p>No se encontró la tarea.</p>";
    exit;
}
?>

