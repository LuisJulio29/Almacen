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

        h1 {
            color: #007BFF;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            max-width: 1200px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-x: auto;
        }

        th, td {
            padding: 12px 15px;
            width: 35%;
            text-align: center;
            border-bottom: 1px solid #ddd;
            white-space: nowrap; /* Asegura que el texto no se ajuste */
        }

        thead {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Agrega una barra de desplazamiento horizontal si la tabla es más grande que el contenedor */
        table {
            display: block;
            max-height: 600px;
            overflow-x: auto;
        }

        /* Hacer que los encabezados de la tabla estén fijos al hacer scroll */
        thead th {
            position: sticky;
            top: 0;
            z-index: 2;
        }
    </style>
</head>
<body>

<h1>Lista de Productos</h1>

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
