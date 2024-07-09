<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $stmt = $pdo->prepare('UPDATE categorias SET nombre = ?, descripcion = ? WHERE id = ?');
    $stmt->execute([$nombre, $descripcion, $id]);

    header('Location: menu.php');
    exit;
}
?>