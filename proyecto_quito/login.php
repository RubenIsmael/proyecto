<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/style.css">
    <style>
   /*colores de fondos y estilos*/
        body {
            background-color: #0d0d0d;/* Color de fondo para el cuerpo */
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-box h3 {
            color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>
<body>
/* Contenido del logo */
<div class="login-container">
        <div class="login-box">
            <div class="d-flex align-items-center justify-content-center mb-3">
                <img src="Imagenes/Game_city.png" alt="Logo" width="60" />
                <h1>INGRESO</h1>
            </div>
            <form action="login_process.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese su usuario o correo" autofocus required>
                    <label for="correo">Usuario o Correo</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" id="contrasenia" name="password" class="form-control" placeholder="Contraseña" required>
                    <label for="contrasenia">Contraseña</label>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me">
                        <label class="form-check-label" for="remember-me">Recuérdame</label>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Ingresar</button>
                </div>
                <div id="error-message" class="text-danger"></div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <!-- Additional Scripts -->
    <script>
        $(document).ready(function () {
            // Cambiar color del botón al pasar el ratón
            $(".btn-primary").hover(
                function () {
                    $(this).css("background-color", "#0056b3");
                },
                function () {
                    $(this).css("background-color", "#007bff");
                }
            );

            // Mostrar mensaje de error si hay error en el login
            <?php if (isset($_GET['error']) && $_GET['error'] == 'true') { ?>
                $("#error-message").text("Correo o contraseña incorrectos.");
            <?php } ?>
        });
    </script>
 
</body>
</html>
medio bien