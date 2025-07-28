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
$email = trim($_POST['email'] ?? '');
$direccion = trim($_POST['direccion'] ?? '');

if ($nombre === '' || $email === '' || $direccion === '') {
    die("Datos inválidos, por favor completa correctamente el formulario.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email inválido.");
}

$stmt = $conn->prepare("INSERT INTO CLIENTE (nombre, email, direccion) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $direccion);

if ($stmt->execute()) {
    echo "Cliente agregado correctamente.<br><a href='cliente_form.html'>Agregar otro cliente</a><br>";
    echo "<a href='mostrar_tablas.php'>Ver tablas</a>";
} else {
    echo "Error al agregar cliente: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
