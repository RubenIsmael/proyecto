<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $rol = $_POST['rol'];

    $stmt = $pdo->prepare('INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nombre, $correo, $contraseña, $rol]);

    header('Location: menu.php');
    exit;
}
?>