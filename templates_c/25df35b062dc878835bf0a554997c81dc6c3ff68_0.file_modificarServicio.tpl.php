<?php
/* Smarty version 5.4.0, created on 2025-02-08 20:23:37
  from 'file:templates/modificarServicio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67a7af3986dd88_85873361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25df35b062dc878835bf0a554997c81dc6c3ff68' => 
    array (
      0 => 'templates/modificarServicio.tpl',
      1 => 1738947536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67a7af3986dd88_85873361 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow" style="width: 100%; max-width: 500px;">
            <h2 class="text-center mb-4">Modificar Servicio</h2>
            <form action="/index.php?action=modificarServicio" method="post">
                <div class="form-group">
                    <label for="id">ID del Servicio:</label>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción del Servicio:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="form-group">
                    <label for="costo">Costo:</label>
                    <input type="number" class="form-control" id="costo" name="costo" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Modificar Servicio</button>
            </form>

            <!-- Botón Volver al Menú -->
            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary">Volver al Menú</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php }
}
