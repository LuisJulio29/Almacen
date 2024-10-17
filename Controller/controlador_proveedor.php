<?php

$api_url = "http://localhost/Almacen/Model/get_proveedores.php";


function obtenerProveedor() {
    global $api_url;
    $response = file_get_contents($api_url);
    $proveedores = json_decode($response, true);

    return $proveedores;
}
?>