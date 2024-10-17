<?php
// vista_tabla_productos.php
require_once('../Controller/controlador_proveedor.php');
$proveedores = obtenerProveedor();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Contenedor para los botones a ambos lados del título -->
<div class="button-container">
    <a href="http://localhost/Almacen/View/TablaProductos.php">Productos</a>
    <a href="http://localhost/Almacen/View/GraficaProductos.php">Gráfica de Productos</a>
</div>

<h1>Lista de Proveedores</h1>

<?php
if (isset($proveedores['mensaje'])) {
    echo "<p style='color: red;'>" . $proveedores['mensaje'] . "</p>";
} else {
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Código</th><th>Nombre</th><th>Telefono</th><th>Direccion</th></tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($proveedores as $proveedor) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($proveedor['codigo']) . "</td>";
        echo "<td>" . htmlspecialchars($proveedor['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($proveedor['telefono']) . "</td>";
        echo "<td>" . htmlspecialchars($proveedor['direccion']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}
?>

</body>
</html>
