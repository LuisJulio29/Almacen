<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
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
            flex-direction: column;
            height: 100vh;
            box-sizing: border-box;
        }

        h1 {
            color: #007BFF;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            max-width: 1000px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
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

        /* Agregar márgenes en el contenido para evitar desbordamiento */
        .content {
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Lista de Productos</h1>
        <?php
        // URL de la API de productos
        $api_url = "http://localhost/Almacen/Model/get_productos.php";

        // Usar file_get_contents para hacer la solicitud a la API
        $response = file_get_contents($api_url);

        // Decodificar la respuesta JSON
        $productos = json_decode($response, true);

        // Verificar si la respuesta contiene productos
        if (isset($productos['mensaje'])) {
            // Mostrar el mensaje de que no hay productos disponibles
            echo "<p style='text-align:center;'>" . $productos['mensaje'] . "</p>";
        } else {
            // Generar la tabla HTML si hay productos
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Código</th>";
            echo "<th>Descripción</th>";
            echo "<th>Unidad</th>";
            echo "<th>Cantidad</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            // Recorrer los productos y generar filas para la tabla
            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>" . $producto['codigoA'] . "</td>";
                echo "<td>" . $producto['descripcion'] . "</td>";
                echo "<td>" . $producto['unidad'] . "</td>";
                echo "<td>" . $producto['cantidad'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
