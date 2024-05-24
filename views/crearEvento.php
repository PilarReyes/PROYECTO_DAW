<?php

include '../models/core.php';

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$fecha_inicio = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
$fecha_fin = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : "";
$ubicacion = isset($_POST["ubicacion"]) ? $_POST["ubicacion"] : "";

if (empty($nombre) || empty($fecha_inicio)) {
    /*header("HTTP/1.0 400 Bad Request");
    die();*/
} else {
    crearEvento($nombre, $descripcion, $fecha_inicio, $fecha_fin, $ubicacion);
}

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="crearEvento">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="datetime-local" class="form-control" name="fecha_inicio" id="fecha_inicio">
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="datetime-local" class="form-control" name="fecha_fin" id="fecha_fin">
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" class="form-control" name="ubicacion" id="ubicacion">
                </div>
                <button type="submit" class="btn btn-primary" id="botonCrear">Guardar Evento</button>
            </form>
        </div>
    </div>
</div>


