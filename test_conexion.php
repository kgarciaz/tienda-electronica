<?php
$conn = new mysqli("localhost", "root", "", "TIENDA");


if ($conn->connect_error) {
    die("Fallo la conexión: " . $conn->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos TIENDA.";
}
?>
