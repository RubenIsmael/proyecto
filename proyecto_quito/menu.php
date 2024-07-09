<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'includes/db.php';

// Función para obtener usuarios
function getUsuarios($pdo) {
    $stmt = $pdo->query('SELECT * FROM usuarios');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener categorías
function getCategorias($pdo) {
    $stmt = $pdo->query('SELECT * FROM categorias');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para obtener productos
function getProductos($pdo) {
    $stmt = $pdo->query('SELECT * FROM productos');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$usuarios = getUsuarios($pdo);
$categorias = getCategorias($pdo);
$productos = getProductos($pdo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    
    <style>
        .hidden { display: none; }
        .btn { padding: 10px 20px; margin: 5px; cursor: pointer; }
        .section { margin: 20px 0; }
    </style>
</head>
<body>
    <h1>Bienvenido al Menú Principal</h1>
    <div>
        <button class="btn" onclick="showSection('usuarios')">Usuarios</button>
        <button class="btn" onclick="showSection('categorias')">Categorías</button>
        <button class="btn" onclick="showSection('productos')">Productos</button>
    </div>

    <!-- Sección Usuarios -->
    <div id="usuarios" class="section hidden">
        <h2>Usuarios</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Rol</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nombre'] ?></td>
                    <td><?= $usuario['correo'] ?></td>
                    <td><?= $usuario['contraseña'] ?></td>
                    <td><?= $usuario['rol'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button class="btn" onclick="showForm('crearUsuario')">Crear Usuario</button>
        <button class="btn" onclick="showForm('eliminarUsuario')">Eliminar Usuario</button>
        <button class="btn" onclick="showForm('actualizarUsuario')">Actualizar Usuario</button>
        <button class="btn" onclick="showSection('menu')">Regresar al Menú</button>
    </div>

    <!-- Formulario Crear Usuario -->
    <div id="crearUsuario" class="section hidden">
        <h2>Crear Usuario</h2>
        <form action="crear_usuario.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="correo" placeholder="Correo" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <input type="text" name="rol" placeholder="Rol" required>
            <button type="submit">Crear</button>
        </form>
        <button class="btn" onclick="showSection('usuarios')">Regresar</button>
    </div>

    <!-- Formulario Eliminar Usuario -->
    <div id="eliminarUsuario" class="section hidden">
        <h2>Eliminar Usuario</h2>
        <form action="eliminar_usuario.php" method="POST">
            <input type="number" name="id" placeholder="ID del Usuario" required>
            <button type="submit">Eliminar</button>
        </form>
        <button class="btn" onclick="showSection('usuarios')">Regresar</button>
    </div>

    <!-- Formulario Actualizar Usuario -->
    <div id="actualizarUsuario" class="section hidden">
        <h2>Actualizar Usuario</h2>
        <form action="actualizar_usuario.php" method="POST">
            <input type="number" name="id" placeholder="ID del Usuario" required>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="correo" placeholder="Correo" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <input type="text" name="rol" placeholder="Rol" required>
            <button type="submit">Actualizar</button>
        </form>
        <button class="btn" onclick="showSection('usuarios')">Regresar</button>
    </div>

    <!-- Sección Categorías -->
    <div id="categorias" class="section hidden">
        <h2>Categorías</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $categoria['id'] ?></td>
                    <td><?= $categoria['nombre'] ?></td>
                    <td><?= $categoria['descripcion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button class="btn" onclick="showForm('crearCategoria')">Crear Categoría</button>
        <button class="btn" onclick="showForm('eliminarCategoria')">Eliminar Categoría</button>
        <button class="btn" onclick="showForm('actualizarCategoria')">Actualizar Categoría</button>
        <button class="btn" onclick="showSection('menu')">Regresar al Menú</button>
    </div>

    <!-- Formulario Crear Categoría -->
    <div id="crearCategoria" class="section hidden">
        <h2>Crear Categoría</h2>
        <form action="crear_categoria.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="descripcion" placeholder="Descripción" required>
            <button type="submit">Crear</button>
        </form>
        <button class="btn" onclick="showSection('categorias')">Regresar</button>
    </div>

    <!-- Formulario Eliminar Categoría -->
    <div id="eliminarCategoria" class="section hidden">
        <h2>Eliminar Categoría</h2>
        <form action="eliminar_categoria.php" method="POST">
            <input type="number" name="id" placeholder="ID de la Categoría" required>
            <button type="submit">Eliminar</button>
        </form>
        <button class="btn" onclick="showSection('categorias')">Regresar</button>
    </div>

    <!-- Formulario Actualizar Categoría -->
    <div id="actualizarCategoria" class="section hidden">
        <h2>Actualizar Categoría</h2>
        <form action="actualizar_categoria.php" method="POST">
            <input type="number" name="id" placeholder="ID de la Categoría" required>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="descripcion" placeholder="Descripción" required>
            <button type="submit">Actualizar</button>
        </form>
        <button class="btn" onclick="showSection('categorias')">Regresar</button>
    </div>

    <!-- Sección Productos -->
    <div id="productos" class="section hidden">
        <h2>Productos</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Categoría ID</th>
            </tr>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= $producto['precio'] ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td><?= $producto['imagen'] ?></td>
                    <td><?= $producto['categoria_id'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button class="btn" onclick="showForm('crearProducto')">Crear Producto</button>
        <button class="btn" onclick="showForm('eliminarProducto')">Eliminar Producto</button>
        <button class="btn" onclick="showForm('actualizarProducto')">Actualizar Producto</button>
        <button class="btn" onclick="showSection('menu')">Regresar al Menú</button>
    </div>

    <!-- Formulario Crear Producto -->
    <div id="crearProducto" class="section hidden">
        <h2>Crear Producto</h2>
        <form action="crear_producto.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="descripcion" placeholder="Descripción" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <input type="text" name="imagen" placeholder="Imagen" required>
            <input type="number" name="categoria_id" placeholder="Categoría ID" required>
            <button type="submit">Crear</button>
        </form>
        <button class="btn" onclick="showSection('productos')">Regresar</button>
    </div>

    <!-- Formulario Eliminar Producto -->
    <div id="eliminarProducto" class="section hidden">
        <h2>Eliminar Producto</h2>
        <form action="eliminar_producto.php" method="POST">
            <input type="number" name="id" placeholder="ID del Producto" required>
            <button type="submit">Eliminar</button>
        </form>
        <button class="btn" onclick="showSection('productos')">Regresar</button>
    </div>

    <!-- Formulario Actualizar Producto -->
    <div id="actualizarProducto" class="section hidden">
        <h2>Actualizar Producto</h2>
        <form action="actualizar_producto.php" method="POST">
            <input type="number" name="id" placeholder="ID del Producto" required>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="descripcion" placeholder="Descripción" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <input type="text" name="imagen" placeholder="Imagen" required>
            <input type="number" name="categoria_id" placeholder="Categoría ID" required>
            <button type="submit">Actualizar</button>
        </form>
        <button class="btn" onclick="showSection('productos')">Regresar</button>
    </div>

    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => section.classList.add('hidden'));
            document.getElementById(sectionId).classList.remove('hidden');
        }

        function showForm(formId) {
            const forms = document.querySelectorAll('.section.hidden');
            forms.forEach(form => form.classList.add('hidden'));
            document.getElementById(formId).classList.remove('hidden');
        }
    </script>
</body>
</html>