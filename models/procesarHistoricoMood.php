<?php
include 'core.php';

$error = '';
$chartData = [];
$chartLabels = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaInicio = $_POST['fechaInicio'] ?? '';
    $fechaFin = $_POST['fechaFin'] ?? '';

    if (empty($fechaInicio) || empty($fechaFin)) {
        $error = "Por favor, selecciona ambas fechas.";
    } else if ($fechaInicio > $fechaFin) {
        $error = "La fecha de inicio no puede ser posterior a la fecha de fin.";
    } else {
        $datos = obtenerHistorialEstadosAnimoPorFecha($fechaInicio, $fechaFin);

        if ($datos !== null && !empty($datos)) {
            $contadorEstados = [];
            foreach ($datos as $fila) {
                if (isset($fila['estado_animo'])) {
                    $estadoAnimo = $fila['estado_animo'];
                    if (!isset($contadorEstados[$estadoAnimo])) {
                        $contadorEstados[$estadoAnimo] = 0;
                    }
                    $contadorEstados[$estadoAnimo]++;
                } else {
                    error_log("La clave 'estado_animo' no está definida en: " . print_r($fila, true));
                }
            }

            foreach ($contadorEstados as $estado => $cantidad) {
                $chartLabels[] = $estado;
                $chartData[] = $cantidad;
            }
        } else {
            $error = "No hay historial para el rango de fechas seleccionado.";
        }
    }
}
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Estado de Ánimo</h4>
        </div>
        <div class="card-body" style="height: 500px;">
            <?php if (!empty($error)): ?>
                <p class='error'><?= htmlspecialchars($error) ?></p>
            <?php else: ?>
                <div id="animating-donut" class="ct-chart ct-golden-section chartlist-chart" style="height: 100%;">
                    <canvas id="moodChart" style="height: 100%; width: 100%;"></canvas>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if (empty($error)): ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('moodChart').getContext('2d');
        var moodChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['<?php echo implode("','", $chartLabels); ?>'],
                datasets: [{
                    data: [<?php echo implode(",", $chartData); ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        color: '#000',
                        font: {
                            weight: 'bold'
                        },
                        formatter: function(value, context) {
                            return context.chart.data.labels[context.dataIndex] + ': ' + value;
                        }
                    },
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.raw;
                                return label;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            },
            plugins: [ChartDataLabels] // Asegúrate de incluir el plugin ChartDataLabels
        });
    });
</script>
<?php endif; ?>
