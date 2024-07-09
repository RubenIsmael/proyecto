<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = '?'");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (($password== $user['contraseña'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: menu.php');
        exit();
    } else {
        header('Location: login.php?error=true');
        exit();
    }
}
?>
medio bien