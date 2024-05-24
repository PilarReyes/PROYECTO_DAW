<?php

include 'core.php';

$id_evento_especial = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre_modificado = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$fecha_modificada = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$tipo_modificado = isset($_POST["tipo"]) ? $_POST["tipo"] : "";
$notas_modificadas = isset($_POST["notas"]) ? $_POST["notas"] : "";

if ($id_evento_especial) {
    echo "ID de evento especial a modificar: " . $id_evento_especial . "<br>";
    echo "Nuevo nombre: " . $nombre_modificado . "<br>";

    modificarEventoEspecial($id_evento_especial, $nombre_modificado, $fecha_modificada, $tipo_modificado, $notas_modificadas);
} else {
    echo "No se proporcionó un ID de evento especial para modificar.";
}

?>

<script src="js/jquery.min.js?<?=date("YmdHis");?>"></script>
<script src="bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>
<script src="js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
