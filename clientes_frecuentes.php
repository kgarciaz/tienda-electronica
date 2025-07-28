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
    SELECT CL.id_cliente, CL.nombre, COUNT(C.id_compra) AS total_compras
    FROM CLIENTE CL
    JOIN COMPRA C ON CL.id_cliente = C.id_cliente
    GROUP BY CL.id_cliente, CL.nombre
    HAVING COUNT(C.id_compra) > 2
    ORDER BY total_compras DESC
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Clientes Frecuentes</title>
</head>
<body>
  <h2>Clientes con más de 2 compras</h2>
  <table border="1">
    <tr><th>ID Cliente</th><th>Nombre</th><th>Total Compras</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id_cliente'] ?></td>
      <td><?= htmlspecialchars($row['nombre']) ?></td>
      <td><?= $row['total_compras'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>

<?php $conn->close(); ?>
