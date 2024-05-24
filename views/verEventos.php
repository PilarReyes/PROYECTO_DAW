
<?php
include '../models/core.php';

$eventos = obtenerEventos();

if ($eventos) { ?>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <th><input type="checkbox" id="checkall" /></th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Ubicación</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php foreach ($eventos as $evento) { ?>
                        <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                            <td><?= htmlspecialchars($evento['nombre']) ?></td>
                            <td><?= htmlspecialchars($evento['descripcion']) ?></td>
                            <td><?= htmlspecialchars($evento['fecha_inicio']) ?></td>
                            <td><?= htmlspecialchars($evento['fecha_fin']) ?></td>
                            <td><?= htmlspecialchars($evento['ubicacion']) ?></td>
                            <!--<td>
                                <p data-placement="top" data-toggle="tooltip" title="Editar">
                                    <form class="editarEvento" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $evento['id'] ?>">
                                        <button type="submit" class="btn btn-primary btn-xs editar-evento" data-title="Editar">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </form>
                                </p>
                            </td>-->
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Editar">
                                <button type="button" class="btn btn-primary btn-xs editar-evento" data-id="<?= $evento['id'] ?>" data-title="Editar" data-toggle="modal" data-target="#modificarEventoModal">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </p>
                            </td>
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Eliminar">
                            <form class="eliminarEvento" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $evento['id'] ?>">
                            <button type="button" id="botonEliminarEvento" class="btn btn-danger btn-xs eliminar-evento" data-title="Eliminar" data-toggle="modal" data-target="#deleteEvento">
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

 <!-- Modal para Modificar Evento -->
 <div class="modal fade" id="modificarEventoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- El contenido dinámico se cargará aquí desde modificarTarea.php -->
            </div>
        </div>
    </div>
</div>

<!-- Modal de eliminación de eventos -->
<div class="modal fade" id="deleteEvento" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Eliminar Evento</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Estás seguro de que deseas eliminar este evento?</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success eliminar-confirmar-evento"><span class="glyphicon glyphicon-ok-sign"></span> Sí</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
    </div>
</div>




<?php 
} else {
    echo "No hay eventos registrados.";
}
?>

