<?php

include 'core.php';

    $id_tarea_modificar = isset($_POST["id"]) ? $_POST["id"] : "";
    $titulo_modificado = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $descripcion_modificada = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $fecha_modificada = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
    $prioridad_modificada = isset($_POST["prioridad"]) ? $_POST["prioridad"] : "";
    $estado_modificado = isset($_POST["estado"]) ? $_POST["estado"] : "";


    if ($id_tarea_modificar) {
        echo "ID de tarea a modificar: " . $id_tarea_modificar . "<br>";
        echo "Nuevo título: " . $titulo_modificado . "<br>";
      
        modificarTarea($id_tarea_modificar, $titulo_modificado, $descripcion_modificada, $fecha_modificada, $prioridad_modificada, $estado_modificado);
    } else {
        echo "No se proporcionó un ID de tarea para modificar.";
    }
    
    ?>

<script src="js/jquery.min.js?<?=date("YmdHis");?>"></script>
<script src="bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

