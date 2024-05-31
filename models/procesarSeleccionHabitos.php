<?php 
include '../models/core.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST); // Ver qué datos están llegando

    if (isset($_POST['habitos_seleccionados']) && !empty($_POST['habitos_seleccionados'])) {
        $habitos_seleccionados = $_POST['habitos_seleccionados'];
        
        echo "Hábitos seleccionados: ";
        print_r($habitos_seleccionados);
        
        foreach ($habitos_seleccionados as $habito_id) {
            $nombre = obtenerNombreHabito($habito_id);
            $descripcion = obtenerDescripcionHabito($habito_id);
            
            echo "Procesando hábito ID: $habito_id, Nombre: $nombre, Descripción: $descripcion\n";
            
            if ($nombre && $descripcion) {
                $insertado = insertarHabito($nombre, $descripcion);
                if (!$insertado) {
                    echo "Error al insertar hábito ID: $habito_id\n";
                } else {
                    echo "Hábito insertado correctamente: $nombre\n";
                }
            } else {
                echo "Nombre o descripción no encontrados para el hábito ID: $habito_id\n";
            }
        }
    } else {
        echo "No se seleccionaron hábitos.\n";
    }
} else {
    echo "Método de solicitud no válido.\n";
}
?>
