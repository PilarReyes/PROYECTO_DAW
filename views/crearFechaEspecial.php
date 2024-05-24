<?php

include '../models/core.php';

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : ""; 
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : ""; 
$notas = isset($_POST["notas"]) ? $_POST["notas"] : "";

if (empty($nombre) || empty($fecha)) {
    /*header("HTTP/1.0 400 Bad Request");
    die();*/
} else {
    crearEventoEspecial($nombre, $fecha, $tipo, $notas);
}

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="crearFechaEspecial"> 
                <div class="form-group">
                    <label for="nombre">Nombre del evento:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha del evento:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha">
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo de evento:</label>
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="cumpleaños">Cumpleaños</option>
                        <option value="aniversario">Aniversario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="notas">Notas:</label>
                    <textarea class="form-control" name="notas" id="notas" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="botonCrear">Guardar Evento Especial</button>
            </form>
        </div>
    </div>
</div>


