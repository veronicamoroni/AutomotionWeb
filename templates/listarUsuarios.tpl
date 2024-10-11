<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la Página</title>
    <link rel="stylesheet" href="ruta/a/bootstrap.css"> <!-- Agrega Bootstrap o cualquier CSS que necesites -->
    <link rel="stylesheet" href="ruta/a/styles.css"> <!-- Estilos adicionales -->
    <script src="ruta/a/scripts.js"></script> <!-- Scripts adicionales -->
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Automotion</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar_usuarios.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrarse.php">Registrar Usuario</a>
                    </li>
                    <!-- Agrega más enlaces según sea necesario -->
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        {block name="content"}{/block}  <!-- Aquí se inserta el contenido de las plantillas que extienden esta -->
    </div>

    <footer class="text-center mt-4">
        <p>&copy; 2024 Automotion. Todos los derechos reservados.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Agrega otros scripts aquí si es necesario -->
</body>
</html>
