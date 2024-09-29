<?php
/* Smarty version 5.4.0, created on 2024-09-29 15:07:32
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66f951145d8e92_57234113',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af090ca5113eab3727cffdcd4811c353e6713bd8' => 
    array (
      0 => 'login.tpl',
      1 => 1727615244,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f951145d8e92_57234113 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Iniciar Sesión</h2>
        <form action="index.php?action=iniciarSesion" method="post">
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
              <input type="password" class="form-control" id="contrasena" name="contrasena" required>

            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
<?php }
}
