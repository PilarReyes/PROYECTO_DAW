<form id="form-habitos">
    <div class="row">
        <?php
        include '../models/core.php';
        $habitospredeterminados = obtenerHabitosPredefinidos();
        if (!empty($habitospredeterminados)) {
            foreach ($habitospredeterminados as $habito) {
                echo '<div class="col-xl-4 col-xxl-6 col-6">';
                echo '<div class="form-check custom-checkbox mb-3">';
                echo '<input type="checkbox" class="form-check-input" name="habitos_seleccionados[]" value="' . $habito['id'] . '" id="customCheckBox' . $habito['id'] . '">';
                echo '<label class="form-check-label" for="customCheckBox' . $habito['id'] . '">' . $habito['nombre'] . ' - ' . $habito['descripcion'] . '</label>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No se encontraron hábitos predefinidos.';
        }
        ?>
    </div>
    <br>
    <input type="submit" value="Guardar" id="btnGuardar" class="btn btn-primary">
</form>
