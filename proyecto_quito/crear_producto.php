<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = $_POST['imagen'];
    $categoria_id = $_POST['categoria_id'];

    $stmt = $pdo->prepare('INSERT INTO productos (nombre, descripcion, precio, stock, imagen, categoria_id) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nombre, $descripcion, $precio, $stock, $imagen, $categoria_id]);

    header('Location: menu.php');
    exit;
}
?>