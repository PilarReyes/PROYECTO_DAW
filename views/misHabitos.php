<?php
include '../models/core.php';

$habitos_usuario = obtenerHabitosActivos(); // Función que obtiene los hábitos del usuario
$calendario = obtenerCalendario(5); // Obtener calendario para 5 días (2 antes, hoy, 2 después)
$fecha_hoy = date('Y-m-d'); // Obtener la fecha de hoy
?>

<!-- Formulario para actualizar el historial -->
<form id="historial-habitos">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Hábito</th>
                <?php foreach ($calendario as $dia => $nombre_dia): ?>
                    <th class="<?php echo ($dia == $fecha_hoy) ? 'table-primary' : ''; ?>">
                        <?php echo htmlspecialchars($nombre_dia); ?>
                    </th>
                <?php endforeach; ?>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($habitos_usuario as $habito): ?>
                <tr id="fila_<?php echo htmlspecialchars($habito['id']); ?>">
                    <td><?php echo htmlspecialchars($habito['nombre']); ?></td>
                    <?php foreach ($calendario as $dia => $nombre_dia): ?>
                        <td class="text-center <?php echo ($dia == $fecha_hoy) ? 'table-primary' : ''; ?>">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="habito_<?php echo htmlspecialchars($habito['id']); ?>_dia_<?php echo htmlspecialchars($dia); ?>" name="habito_<?php echo htmlspecialchars($habito['id']); ?>_dia_<?php echo htmlspecialchars($dia); ?>">
                                <label class="custom-control-label" for="habito_<?php echo htmlspecialchars($habito['id']); ?>_dia_<?php echo htmlspecialchars($dia); ?>"></label>
                            </div>
                        </td>
                    <?php endforeach; ?>
                    <td class="text-center">
                        <p data-placement="top" data-toggle="tooltip" title="Eliminar">
                            <form class="eliminarHabito" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($habito['id']); ?>">
                                <button type="button" id="eliminarHabito" class="btn btn-danger btn-xs eliminar-habito" data-title="Eliminar" data-toggle="modal" data-target="#delete">
                                    <i class="fa-solid fa-trash-alt"></i>
                                </button>
                            </form>
                        </p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" id="guardar_historial" class="btn btn-primary">Guardar</button>
</form>
