<?php
/* Smarty version 5.4.0, created on 2024-09-10 02:37:22
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66df94c27983c3_97681599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1df1dfe45cda9568a9b3592e23009d419b5d33c7' => 
    array (
      0 => 'index.tpl',
      1 => 1725651317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66df94c27983c3_97681599 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\automotionweb\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Automotion</title>
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

   
    
    .custom-font {
      font-family: 'CustomFont', sans-serif; 
      
    }
    </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="Logo">
    </a>
    <div class="mx-auto">
      <h1 class="text-center text-white custom-font">Automotion</h1>
    </div>
  </nav>

  <div class="container text-center mt-5">
    <div class="card mx-auto" style="max-width: 36rem;">
      <div class="card-body">
       
        <h6 class="card-subtitle mb-2 text-muted">Sistema de Gestión</h6>
        <form>
          <div class="form-group">
            <label for="usuario" class="font-weight-bold">Usuario</label>
            <input type="text" class="form-control" id="usuario" placeholder="Ingresa tu usuario">
          </div>
          <div class="form-group">
            <label for="contrasena" class="font-weight-bold">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" placeholder="Ingresa tu contraseña">
          </div>
          <div class="form-group text-right">
            <a href="#" class="text-muted">Olvidé mi contraseña</a>
          </div>
          <button type="button" class="btn btn-primary" onclick="window.location.href='menu.html'">Iniciar Sesión</button>
        </form>
        <div class="mt-3">
          <p class="text-muted">Si aún no tienes cuenta, puedes <a href="index.php?action=register" class="text-primary">registrarte aquí</a>.</p>

        </div>
      </div>
    </div>
  </div>

  <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
