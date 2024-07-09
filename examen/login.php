<?php
session_start();
include './config/conexion.php';

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
        header("Location: ./views/usuarios/home.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Administrador</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <img src="./public/images/logo.png" style="width: 15%;">
                        </div>
                        <h4 class="mb-2 text-center">Bienvenido</h4>
                        <p class="mb-4 text-center">Por favor, ingresa tus credenciales para acceder a tu cuenta.</p>

                        <form method="POST" action="login.php" class="mb-3">
                            <?php if (isset($error)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario" required autofocus>
                            </div>
                            <div class="form-group form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label for="password">Contraseña</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="*************" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary btn-block" type="submit">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>