<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - Automotion</title>
  <!-- Enlace a Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
   <style>
   
    .navbar-custom {
      background-color: #004085; /* Color de fondo azul */
        background-size: cover;
    }
    .navbar-custom .navbar-brand img {
      width: 100px; /* Tamaño del logo */
    }
    body {
      background-image: url('/imagen.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      background-attachment: fixed; /
    }

    
    </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="index.html">
      <img src="/logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      
    </div>
  </nav>

  <div class="container text-center mt-5">
    <div class="card mx-auto" style="max-width: 36rem;">
      <div class="card-body">
        <h1 class="card-title text-primary">Registro</h1>
        <form id="registroForm">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre">
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" placeholder="Ingresa tu apellido">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Ingresa tu email">
          </div>
          <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" placeholder="Ingresa tu contraseña">
          </div>
          <button type="button" class="btn btn-primary" onclick="window.location.href='menu.html'">Registrarse</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Enlace a jQuery y Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
