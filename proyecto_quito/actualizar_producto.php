<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = $_POST['imagen'];
    $categoria_id = $_POST['categoria_id'];

    $stmt = $pdo->prepare('UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?, imagen = ?, categoria_id = ? WHERE id = ?');
    $stmt->execute([$nombre, $descripcion, $precio, $stock, $imagen, $categoria_id, $id]);

    header('Location: menu.php');
    exit;
}
?>
