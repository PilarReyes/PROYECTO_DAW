<?php
include 'core.php';


    $id_tarea = isset($_POST['id']) ? $_POST['id'] : '';

    echo "ID de tarea recibido: " . $id_tarea;

   
    if (!empty($id_tarea)) {
      
        eliminarTarea($id_tarea);
        echo "Intentando eliminar la tarea con ID: " . $id_tarea . "<br>";
    }

?>

<script src="../js/jquery.min.js?<?=date("YmdHis");?>"></script>
<script src="../bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>
<script src="../js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

