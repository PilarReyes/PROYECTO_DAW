<?php

include '../models/core.php';;

    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $prioridad = isset($_POST["prioridad"]) ? $_POST["prioridad"] : "";
    $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";

    if (empty($titulo) || empty($fecha) || empty($prioridad) || empty($estado))  {
        /*header("HTTP/1.0 400 Bad Request");
        die();*/
    }
    
    else 
    {
        
        crearTarea($titulo, $descripcion, $fecha, $prioridad, $estado);
  
    }

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="crearTarea">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" name="titulo" id="titulo">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha">
                </div>
                <div class="form-group">
                    <label for="prioridad">Prioridad:</label>
                    <select class="form-control" name="prioridad" id="prioridad">
                        <option value="alta">Alta</option>
                        <option value="media">Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-control" name="estado" id="estado">
                        <option value="pendiente">Pendiente</option>
                        <option value="completada">Completada</option>
                        <option value="aplazada">Aplazada</option>
                        <option value="cancelada">Cancelada</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="botonCrear">Guardar Tarea</button>
            </form>
        </div>
    </div>
</div>
