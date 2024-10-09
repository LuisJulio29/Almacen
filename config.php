<?php
// Archivo: config.php

$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "proveedores";

try {
    // Crear una nueva conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$base_datos;charset=utf8", $usuario, $password);
    
    // Establecer el modo de error de PDO para que lance excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejo de errores de conexión
    die("Error de conexión: " . $e->getMessage());
}
?>
