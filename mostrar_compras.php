<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "TIENDA";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$result = $conn->query("
    SELECT C.id_compra, CL.nombre AS cliente, P.nombre AS producto, C.cantidad, C.total, C.fecha
    FROM COMPRA C
    JOIN CLIENTE CL ON C.id_cliente = CL.id_cliente
    JOIN PRODUCTO P ON C.id_producto = P.id_producto
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Compras Registradas</title>
</head>
<body>
  <h2>Compras</h2>
  <table border="1">
    <tr>
      <th>ID</th><th>Cliente</th><th>Producto</th><th>Cantidad</th><th>Total</th><th>Fecha</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id_compra'] ?></td>
      <td><?= htmlspecialchars($row['cliente']) ?></td>
      <td><?= htmlspecialchars($row['producto']) ?></td>
      <td><?= $row['cantidad'] ?></td>
      <td>$<?= number_format($row['total'], 2, ',', '.') ?></td>
      <td><?= $row['fecha'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>

<?php $conn->close(); ?>
