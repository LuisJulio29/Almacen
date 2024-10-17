<?php
// vista_grafica_productos.php
require_once('../Controller/controlador_productos.php');

// Obtener conteo por unidad
$conteo_unidad = obtenerConteoPorUnidad();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Productos por Unidad</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
    </style>
</head>
<body>

<div class="button-container">
    <a href="http://localhost/Almacen/View/TablaProveedores.php">Proveedores</a>
    <a href="http://localhost/Almacen/View/TablaProductos.php">Productos</a>
</div>

<h1>Gráfica de Productos por Unidad</h1>

<canvas id="productosChart"></canvas>

<script>
    // Datos para el gráfico de barras
    const ctx = document.getElementById('productosChart').getContext('2d');
    const unidades = <?php echo json_encode(array_keys($conteo_unidad)); ?>;
    const cantidades = <?php echo json_encode(array_values($conteo_unidad)); ?>;

    const productosChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: unidades, // Etiquetas por unidad
            datasets: [{
                label: 'Cantidad de Productos',
                data: cantidades, // Valores correspondientes
                backgroundColor: '#007BFF',
                borderColor: '#0056b3',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // El gráfico incrementará de 1 en 1 en el eje Y
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>

</body>
</html>
