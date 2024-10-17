<?php
// controlador_productos.php

// URL de la API de productos
$api_url = "http://localhost/Almacen/Model/get_productos.php";

// Función para obtener los productos de la API
function obtenerProductos() {
    global $api_url;
    $response = file_get_contents($api_url);
    $productos = json_decode($response, true);

    return $productos;
}

// Función para obtener el conteo de productos agrupados por "unidad"
function obtenerConteoPorUnidad() {
    $productos = obtenerProductos();
    $conteo = [];

    if (isset($productos['mensaje'])) {
        return $conteo;
    }

    foreach ($productos as $producto) {
        $unidad = $producto['unidad'];
        if (!isset($conteo[$unidad])) {
            $conteo[$unidad] = 0;
        }
        $conteo[$unidad]++;
    }

    return $conteo;
}

?>
