<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Videojuegos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="Imagenes/Game_city.png" alt="Logo" width="50">
        <h1>GAME CITY</h1>
        <nav>
            <a href="terminos.php">Términos y Condiciones</a>
            <a href="login.php">Ingreso</a>
        </nav>
    </header>
    <div class="container">
        <div class="sidebar">
            <h2>Géneros</h2>
            <a href="?categoria=1">Acción</a>
            <a href="?categoria=2">Aventura</a>
            <a href="?categoria=3">Deportes</a>
            <a href="?categoria=4">Estrategia</a>
            <a href="?categoria=5">Rol</a>
        </div>
        <div class="content">
            <?php
            $categoria_id = isset($_GET['categoria']) ? (int)$_GET['categoria'] : 0;
            $sql = 'SELECT * FROM productos';
            if ($categoria_id > 0) {
                $sql .= ' WHERE categoria_id = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$categoria_id]);
            } else {
                $stmt = $pdo->query($sql);
            }
            while ($row = $stmt->fetch()) {
                echo '<div class="product">';
                echo '<img src="Imagenes/' . htmlspecialchars($row['imagen']) . '" alt="Imagen">';
                echo '<h3>' . htmlspecialchars($row['nombre']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['descripcion']) . '</p>';
                echo '<p>Precio: $' . htmlspecialchars($row['precio']) . '</p>';
                echo '<p>Stock: ' . htmlspecialchars($row['stock']) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>