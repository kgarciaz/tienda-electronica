<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "TIENDA";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$resultProd = $conn->query("SELECT * FROM PRODUCTO");
$resultCli = $conn->query("SELECT * FROM CLIENTE");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Contenido de Tablas TIENDA</title>
</head>
<body>

<h2>Productos</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th></tr>
    </thead>
    <tbody>
        <?php while ($row = $resultProd->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id_producto']) ?></td>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['descripcion']) ?></td>
            <td>$<?= number_format($row['precio'], 2, ',', '.') ?></td>
            <td><?= htmlspecialchars($row['stock']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<h2>Clientes</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Dirección</th></tr>
    </thead>
    <tbody>
        <?php while ($row = $resultCli->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id_cliente']) ?></td>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['direccion']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<a href="producto_form.html">Agregar Producto</a> | <a href="cliente_form.html">Agregar Cliente</a>

</body>
</html>

<?php
$conn->close();
?>
