<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "TIENDA";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_cliente = $_POST['id_cliente'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];


$query = $conn->prepare("SELECT precio FROM PRODUCTO WHERE id_producto = ?");
$query->bind_param("i", $id_producto);
$query->execute();
$result = $query->get_result();

if ($result->num_rows == 0) {
    die("Producto no encontrado.");
}
$producto = $result->fetch_assoc();
$precio = $producto['precio'];
$total = $cantidad * $precio;


$stmt = $conn->prepare("INSERT INTO COMPRA (cantidad, total, id_producto, id_cliente) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ddii", $cantidad, $total, $id_producto, $id_cliente);

if ($stmt->execute()) {
    echo "Compra registrada correctamente.<br><a href='compra_form.html'>Registrar otra compra</a><br>";
    echo "<a href='mostrar_compras.php'>Ver tabla COMPRA</a>";
} else {
    echo "Error al registrar compra: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
