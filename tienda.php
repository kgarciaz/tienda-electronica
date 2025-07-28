<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Comercio Electrónico</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Enlace al carrito -->
<div style="text-align: right; margin: 10px;">
    <a href="carrito.php">🛒 Ver carrito</a>
</div>

<!-- Buscador -->
    <div class="search-container">
        <input type="text" id="product-search" placeholder="Buscar producto">
        <button id="search-button">Buscar</button>
    </div>

    <!-- Notificaciones-->
    <div id="notifications">
    </div>

    <!-- Resultados de búsqueda -->
    <div id="results-container">
        <!--Los resultados de la búsqueda se mostrarán aquí -->
    </div>
    
    <!-- Formulario de reseña -->
    <div class="review-container">
    <h2>Deja tu reseña</h2>
    <form action="reseña.php" method="post">
        <input type="hidden" name="productoId" value="123">

        <label>Usuario:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Calificación:</label><br>
        <select name="calificacion">
            <option value="1">1 ⭐</option>
            <option value="2">2 ⭐⭐</option>
            <option value="3" selected>3 ⭐⭐⭐</option>
            <option value="4">4 ⭐⭐⭐⭐</option>
            <option value="5">5 ⭐⭐⭐⭐⭐</option>
        </select><br><br>

        <label>Comentario:</label><br>
        <textarea name="comentario" rows="4" cols="40" placeholder="Cuéntanos tu experiencia..."></textarea><br><br>

        <input type="submit" value="Enviar reseña">
    </form>
    </div>

    <!-- Formulario registro pedido -->
    <div class="pedido-container">
    <h2>Realiza tu pedido</h2>
    <form action="procesar_pedido.php" method="post">
        <label>Descripción:</label><br>
        <input type="text" name="descripcion" required><br><br>

        <label>Tipo de pedido:</label><br>
        <select name="tipo">
            <option value="Compra">Compra</option>
            <option value="Reserva">Reserva</option>
        </select><br><br>

        <label>Producto:</label><br>
        <input type="text" name="producto" required><br><br>

        <label>Unidades:</label><br>
        <input type="number" name="unidades" min="1" required><br><br>

        <label>Observaciones:</label><br>
        <textarea name="observaciones" rows="3" cols="40" placeholder="Ej: Entregar en horario de mañana desde las 08:00 am..."></textarea><br><br>

        <input type="submit" value="Enviar pedido">
    </form>
    </div>

<!-- Estado del carrito -->    
    <div id="cart-status">
        🛒Carrito: <span id="cart-count">0</span> productos
    </div>

    <script src="java.js"></script>

</body>
</html>
