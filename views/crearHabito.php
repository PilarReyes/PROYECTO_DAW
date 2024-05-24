<?php
include '../models/core.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

    if (empty($nombre) || empty($descripcion)) {
        echo "Error: Todos los campos son obligatorios.";
    } else {
        if (insertarHabito($nombre, $descripcion)) {
            echo "Hábito creado correctamente";
        } else {
            echo "Error al crear el hábito";
        }
    }
} else {
    // Solo mostrar el formulario si no se está enviando una solicitud POST
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="crearHabito">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label><br>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" id="botonCrear">Guardar Hábito</button>
            </form>
        </div>
    </div>
</div>

<?php
}


?>
