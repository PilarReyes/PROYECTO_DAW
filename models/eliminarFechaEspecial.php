<?php
include 'core.php';

$id_evento = isset($_POST['id']) ? $_POST['id'] : '';

echo "ID de evento recibido: " . $id_evento;

if (!empty($id_evento)) {
    eliminarEventoEspecial($id_evento);
}
?>

<script src="js/jquery.min.js?<?=date("YmdHis");?>"></script>
<script src="bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>
<script src="../js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
