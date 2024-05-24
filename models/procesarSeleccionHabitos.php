<?php 

$habitos_seleccionados = $_POST['habitos_seleccionados'];

      
 
 foreach ($habitos_seleccionados as $habito_id) {
    
            $nombre = obtenerNombreHabito($habito_id);
            $descripcion = obtenerDescripcionHabito($habito_id);
            
            if ($nombre && $descripcion) {
                $insertado = insertarHabito($nombre, $descripcion);}
            } 
            
            ?>