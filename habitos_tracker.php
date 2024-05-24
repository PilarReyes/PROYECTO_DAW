<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Intervalo de Fechas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        /* Mejora la disposición visual */
        form { margin-top: 20px; }
        label, input, select, button { margin-bottom: 10px; display: block; }
    </style>
</head>
<body>
    <h2>Seleccionar Intervalo de Fechas</h2>
    <form action="procesar_habitos_tracker.php" method="POST">
        <!-- Selección de intervalos predefinidos -->
        <label for="intervalos">Intervalos Predefinidos:</label>
        <select id="intervalos">
            <option value="">Seleccionar...</option>
            <option value="ultima_semana">Última Semana</option>
            <option value="ultimo_mes">Último Mes</option>
            <option value="ultimo_anio">Último Año</option>
        </select>

        <!-- Selector de fecha para la fecha de inicio -->
        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="text" id="fechaInicio" name="fechaInicio"><br>

        <!-- Selector de fecha para la fecha de fin -->
        <label for="fechaFin">Fecha de Fin:</label>
        <input type="text" id="fechaFin" name="fechaFin"><br>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Ver Historial</button>
    </form>

    <!-- Enlazar el script de habitos.js -->
    <script src="js/habitos.js"></script>
</body>
</html>

<a href="dashboard.php">Volver al inicio</a>