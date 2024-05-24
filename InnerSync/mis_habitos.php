<?php
include 'conexion.php';
include 'funcion_habitos.php';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Hábitos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Mis Hábitos</h2>
    <form action="historial_habitos.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Hábito</th>
                    <!-- Añadir encabezados de columna para los días del calendario -->
                    <?php foreach ($calendario as $dia => $nombre_dia) : ?>
                        <th><?php echo $nombre_dia; ?></th>
                    <?php endforeach; ?>
                    <!-- Añadir encabezados de columna para los días del calendario -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($habitos_usuario as $habito) : ?>
                    <tr>
                        <td><?php echo $habito['nombre']; ?></td>
                        <!-- Añadir checkboxes para cada día del calendario -->
                        <?php foreach ($calendario as $dia => $nombre_dia) : ?>
                            <td>
                                <input type="checkbox" name="habito_<?php echo $habito['id']; ?>_dia_<?php echo $dia; ?>">
                            </td>
                        <?php endforeach; ?>
                        <!-- Añadir checkboxes para cada día del calendario -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Añadir botón de guardar -->
        <button type="submit" name="guardar_historial">Guardar</button>
    </form>
    <script src="habitos.js"></script>
</body>

</html>
