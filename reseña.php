<?php
function guardarReseña($productoId, $usuario, $calificacion, $comentario) {
    $archivo = 'resenas.txt';
    $nuevaReseña = "$productoId|$usuario|$calificacion|$comentario\n";
    file_put_contents($archivo, $nuevaReseña, FILE_APPEND);
    echo "Gracias por tu reseña.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productoId = htmlspecialchars($_POST['productoId']);
    $usuario = htmlspecialchars($_POST['usuario']);
    $calificacion = htmlspecialchars($_POST['calificacion']);
    $comentario = htmlspecialchars($_POST['comentario']);

    guardarReseña($productoId, $usuario, $calificacion, $comentario);
}

?>

