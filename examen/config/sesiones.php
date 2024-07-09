<?php
session_start();
include './config/conexion.php';  // Ruta corregida

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $conexion = new Conexion();
    $pdo = $conexion->pdo;

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password");
    $stmt->execute(['usuario' => $usuario, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['usuario'] = $user['usuario'];
        header("Location: ./views/usuarios/home.php");  // Ruta corregida
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

