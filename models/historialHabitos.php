<?php
include_once 'core.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recorrer los datos enviados
    foreach ($_POST as $key => $value) {
        // Verificar si el campo es un checkbox de hábito
        if (strpos($key, 'habito_') === 0 && strpos($key, '_dia_') !== false) {
            // Extraer el ID del hábito y la fecha del campo
            $parts = explode('_dia_', str_replace('habito_', '', $key));
            $habito_id = $parts[0];
            $fecha = $parts[1];

            // Insertar el historial del hábito en la base de datos
            insertarHistoricoHabito($habito_id, $fecha);
        }
    }

}

