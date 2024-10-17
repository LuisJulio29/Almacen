<?php
// vista_tabla_productos.php
require_once('../Controller/controlador_productos.php');

$productos = obtenerProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

<div class="button-container">
    <a href="http://localhost/Almacen/View/TablaProveedores.php">Proveedores</a>
    <a href="http://localhost/Almacen/View/GraficaProductos.php">Gráfica de Productos</a>
</div>

<h1>Lista de Productos</h1>

<?php
if (isset($productos['mensaje'])) {
    echo "<p style='color: red;'>" . $productos['mensaje'] . "</p>";
} else {
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Código</th><th>Descripción</th><th>Unidad</th><th>Cantidad</th></tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($productos as $producto) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($producto['codigoA']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['descripcion']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['unidad']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['cantidad']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}
?>

</body>
</html>
