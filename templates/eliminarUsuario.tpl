<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-custom {
            background-color: #004085; 
        }
        .navbar-custom .navbar-brand img {
            width: 100px;
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
            font-family: 'CustomFont', sans-serif;
            font-weight: bolder;
            font-size: 3.5rem;
            background: linear-gradient(90deg, yellow, white);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        .login-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 0.8rem;
        }
        .navbar-title {
            flex: 1;
            text-align: center;
        }
        .centered-container {
            height: calc(100vh - 60px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo">
        </a>
        <div class="navbar-title">
            <h1 class="custom-font m-0">Automotion</h1>
        </div>
        <button class="btn btn-light login-btn" onclick="window.location.href='login.tpl'">Iniciar Sesión</button>
    </nav>

    <div class="container centered-container d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <section class="col-md-8">
                <div class="text-center mb-4">
                    <span class="material-symbols-outlined">Eliminar</span>
                </div>
                <div class="card p-4 shadow">
                    <form action="index.php?action=eliminarUsuario" method="post">
                        <div class="form-group">
                            <label for="id">ID del usuario a eliminar:</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block">Eliminar Usuario</button>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
