<?php

include 'core.php';

$id_evento_modificar = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre_modificado = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$descripcion_modificada = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$fecha_inicio_modificada = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
$fecha_fin_modificada = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : "";
$ubicacion_modificada = isset($_POST["ubicacion"]) ? $_POST["ubicacion"] : "";

if ($id_evento_modificar) {
    echo "ID de evento a modificar: " . $id_evento_modificar . "<br>";
    echo "Nuevo nombre: " . $nombre_modificado . "<br>";

    modificarEvento($id_evento_modificar, $nombre_modificado, $descripcion_modificada, $fecha_inicio_modificada, $fecha_fin_modificada, $ubicacion_modificada);
} else {
    echo "No se proporcionó un ID de evento para modificar.";
}

?>

<script src="js/jquery.min.js?<?=date("YmdHis");?>"></script>
<script src="bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
