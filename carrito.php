<?php
session_start();

$carrito = $_SESSION['carrito'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Carrito de compras</h2>

<?php if (count($carrito) > 0): ?>
    <ul>
        <?php foreach ($carrito as $item): ?>
            <li><?= htmlspecialchars($item['nombre']) ?> - $<?= htmlspecialchars($item['precio']) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="vaciar_carrito.php">Vaciar carrito</a>
<?php else: ?>
    <p>El carrito está vacío.</p>
<?php endif; ?>

<a href="tienda.php">← Volver a la tienda</a>

</body>
</html>
