<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['id'], $_POST['nombre'], $_POST['precio'])) {
        $producto = [
            "id" => htmlspecialchars($_POST['id']),
            "nombre" => htmlspecialchars($_POST['nombre']),
            "precio" => htmlspecialchars($_POST['precio'])
        ];

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $_SESSION['carrito'][] = $producto;

        header("Location: carrito.php");
        exit;
    } else {
        header("Location: tienda.php?error=datos_incompletos");
        exit;
    }
} else {
    header("Location: tienda.php");
    exit;
}
?>
