<?php
// Verificar si el formulario fue enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar variables del formulario
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $producto = htmlspecialchars($_POST['producto']);
    $unidades = (int)$_POST['unidades'];
    $observaciones = htmlspecialchars($_POST['observaciones']);

    // Mostrar resumen del pedido
    echo "<div style='font-family: Arial; margin: 30px auto; width: 80%; border: 1px solid #ccc; padding: 20px; border-radius: 10px;'>";
    echo "<h2>✅ Resumen del Pedido</h2>";
    echo "<p><strong>Descripción:</strong> $descripcion</p>";
    echo "<p><strong>Tipo:</strong> $tipo</p>";
    echo "<p><strong>Producto:</strong> $producto</p>";
    echo "<p><strong>Unidades:</strong> $unidades</p>";
    echo "<p><strong>Observaciones:</strong> $observaciones</p>";
    echo "<a href='index.html'>← Volver a la tienda</a>";
    echo "</div>";
} else {
    // Si se accede directamente sin enviar datos
    echo "<p>Error: No se ha enviado ningún formulario.</p>";
}
?>
