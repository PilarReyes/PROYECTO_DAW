<?php
include '../models/core.php'; 

$estadosAnimo = obtenerMood();

if (empty($estadosAnimo)) {
    echo "Error al obtener los estados de ánimo o no hay datos disponibles.";
}
?>
<div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">¿Cómo te sientes hoy?</h4>
        </div>
        <div class="card-body">
            <form id="moodTracker">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <select name="estado_animo" id="selectEstadoAnimo" class="form-select" aria-label="Seleccionar estado de ánimo">
                                <option value="" selected disabled>- Selecciona estado de ánimo -</option>
                                <?php foreach ($estadosAnimo as $fila) : ?>
                                    <option value="<?php echo $fila['estado_animo']; ?>"><?php echo $fila['estado_animo']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-sm btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

