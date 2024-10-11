<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados para la barra de navegación */
        .navbar-custom {
            background-color: #004085; /* Color de fondo azul */
        }
        .navbar-custom .navbar-brand img {
            width: 100px; /* Tamaño del logo */
        }
        body {
            background-image: url('imagen.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
        }
        .material-symbols-outlined {
            font-size: 3.5rem;
        }
        .custom-font {
            font-family: 'CustomFont', sans-serif; /* Aplica la fuente personalizada */
            font-weight: bolder;
            font-size: 3.5rem; /* Tamaño del texto */
          background: linear-gradient(90deg, yellow, white);

            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .login-btn {
            position: absolute;
            top: 20px; /* Espaciado desde la parte superior */
            right: 20px; /* Espaciado desde el lado derecho */
            font-size: 0.8rem; /* Tamaño de fuente más pequeño */
        }
        .navbar-title {
            flex: 1;
            text-align: center; /* Centrar el texto del título */
        }
        .centered-container {
            height: calc(100vh - 60px); /* Ajuste para la altura */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo"> <!-- Cambia la ruta a tu logo -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-title"> <!-- Contenedor para centrar el título -->
            <h1 class="custom-font m-0">Automotion</h1>
        </div>
        <button class="btn btn-light login-btn" onclick="window.location.href='login.tpl'">Iniciar Sesión</button>
    </nav>

    <div class="container centered-container d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <section class="col-md-8">
                <div class="text-center mb-4">
                    <span class="material-symbols-outlined">person_add</span>
                </div>
                <div class="card p-4 shadow">
                    <form action="index.php?action=registrarse" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="contrasena">Contraseña:</label>
                            <input type="contrasena" class="form-control" id="contrasena" name="contrasena" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                    </form>
                </div>
                <button class="btn btn-light login-btn" onclick="window.location.href='menu.tpl'">Iniciar Sesión</button>
</nav>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
