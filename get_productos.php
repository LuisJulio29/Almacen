<?php
// Archivo: get_productos.php

// Incluir el archivo de configuración
include 'config.php';

try {
    // Preparar la consulta SQL
    $sql = "SELECT codigoA, descripcion, unidad, cantidad FROM productos";
    
    // Ejecutar la consulta
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Obtener los resultados como un array asociativo
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si hay productos
    if (count($productos) > 0) {
        // Devolver los productos en formato JSON
        echo json_encode($productos);
    } else {
        // Si no hay productos, devolver un mensaje
        echo json_encode(array("mensaje" => "No hay productos disponibles."));
    }
} catch (PDOException $e) {
    // Manejo de errores en la consulta
    echo json_encode(array("error" => "Error al ejecutar la consulta: " . $e->getMessage()));
}

// Cerrar la conexión
$conn = null;
?>
