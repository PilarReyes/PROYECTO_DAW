<?php
include '../models/core.php';

$fechasEspeciales = obtenerEventosEspeciales(); 

if ($fechasEspeciales) { ?>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                        <th><input type="checkbox" id="checkall" /></th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Notas</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php foreach ($fechasEspeciales as $fechaEspecial) { ?>
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td><?= htmlspecialchars($fechaEspecial['nombre']) ?></td>
                            <td><?= htmlspecialchars($fechaEspecial['fecha']) ?></td>
                            <td><?= htmlspecialchars($fechaEspecial['tipo']) ?></td>
                            <td><?= htmlspecialchars($fechaEspecial['notas']) ?></td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Editar">
                                    <button type="button" class="btn btn-primary btn-xs editar-fecha-especial" data-id="<?= $fechaEspecial['id'] ?>" data-title="Editar" data-toggle="modal" data-target="#modificarFechaEspecialModal">
                                    <i class="fa-solid fa-pencil"></i>
                                    </button>
                                </p>
                            </td>
                            <td>
                                <p data-placement="top" data-toggle="tooltip" title="Eliminar">
                                    <form class="eliminarFechaEspecial" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $fechaEspecial['id'] ?>">
                                        <button type="button" id="botonEliminarFechaEspecial" class="btn btn-danger btn-xs eliminar-fecha-especial" data-title="Eliminar" data-toggle="modal" data-target="#deleteFechaEspecial">
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



    


<?php 
} else {
    echo "No hay fechas especiales registradas.";
}
?>

