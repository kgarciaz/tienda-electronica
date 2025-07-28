<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "TIENDA";


$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = trim($_POST['nombre'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$precio = floatval($_POST['precio'] ?? 0);
$stock = intval($_POST['stock'] ?? 0);

if ($nombre === '' || $descripcion === '' || $precio <= 0 || $stock < 0) {
    die("Datos inválidos. Verifica que todos los campos estén completos y correctos.");
}


$stmt = $conn->prepare("INSERT INTO PRODUCTO (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die("Error en prepare(): " . $conn->error);
}
$stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $stock);


if ($stmt->execute()) {
    echo "Producto agregado correctamente.<br><a href='producto_form.html'>Agregar otro producto</a><br>";
    echo "<a href='mostrar_tablas.php'>Ver tablas</a>";
} else {
    echo "Error al agregar producto: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
