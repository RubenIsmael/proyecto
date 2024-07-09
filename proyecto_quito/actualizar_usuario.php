<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    $stmt = $pdo->prepare('UPDATE usuarios SET nombre = ?, correo = ?, contraseña = ?, rol = ? WHERE id = ?');
    $stmt->execute([$nombre, $correo, $contraseña, $rol, $id]);

    header('Location: menu.php');
    exit;
}
?>