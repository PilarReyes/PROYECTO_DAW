<?php
include '../models/core.php';

$tareas = obtenerTareas();

if ($tareas) { ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <th><input type="checkbox" id="checkall" /></th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php foreach ($tareas as $tarea) { ?>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td><?= htmlspecialchars($tarea['titulo']) ?></td>
                            <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
                            <td><?= htmlspecialchars($tarea['fecha']) ?></td>
                            <td><?= htmlspecialchars($tarea['prioridad']) ?></td>
                            <td><?= htmlspecialchars($tarea['estado']) ?></td>
                            
                            <!--<p data-placement="top" data-toggle="tooltip" title="Editar">
                            <form id="modificarTarea" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $tarea['id'] ?>">
                                <button type="submit" class="btn btn-primary btn-xs" data-title="Editar" id="botonActualizar">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </form>
                            </p>-->
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Editar">
                                <button type="button" class="btn btn-primary btn-xs editar-tarea" data-id="<?= $tarea['id'] ?>" data-title="Editar" data-toggle="modal" data-target="#modificarTareaModal">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </p>
                            </td>
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Eliminar">
                            <form class="eliminarTarea" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $tarea['id'] ?>">
                            <button type="button" id="botonEliminarTarea" class="btn btn-danger btn-xs eliminar-tarea" data-title="Eliminar" data-toggle="modal" data-target="#delete">
                            <i class="fa-solid fa-trash-alt"></i>
                            </button>
                            </form>
                            </p>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!--<script src="js/jquery.min.js?<?=date("YmdHis");?>"></script>
<script src="bootstrap/js/bootstrap.min.js?<?=date("YmdHis");?>"></script>-->
<script src="../js/customHook.js?<?=date("YmdHis");?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<?php 
} else {
    echo "No hay tareas registradas.";
}
?>
