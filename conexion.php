<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // Ajusta según tu servidor
$bd = "TIENDA";

$conn = new mysqli($host, $usuario, $contrasena, $bd);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
