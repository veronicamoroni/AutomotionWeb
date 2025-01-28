<?php
/* Smarty version 5.4.0, created on 2025-01-27 02:05:41
  from 'file:templates/eliminarVehiculo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6796dbe59a30a0_52299839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e654a0e3d07af879d3efb046840e664f3064dc1d' => 
    array (
      0 => 'templates/eliminarVehiculo.tpl',
      1 => 1737751829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_6796dbe59a30a0_52299839 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Vehículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">

</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Eliminar Vehículo</span>
            </div>

            <!-- Formulario de eliminación de vehículo -->
            <form id="formEliminarVehiculo" action="/index.php?action=eliminarVehiculo" method="post">
                <div class="form-group">
                    <label for="patente">Patente del vehículo a eliminar:</label>
                    <input type="text" class="form-control" id="patente" name="patente" required>
                </div>
                <button type="submit" class="btn btn-danger btn-block">Eliminar Vehículo</button>
            </form>

            <!-- Área para mostrar mensajes de éxito o error -->
            <div id="mensaje" class="message"></div>
            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
            </div>
        </div>
    </div>

    <!-- JavaScript para manejar el envío del formulario y mostrar el mensaje -->
    <?php echo '<script'; ?>
>
        document.getElementById('formEliminarVehiculo').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formEliminarVehiculo');
            const formData = new FormData(form);

            fetch('/index.php?action=eliminarVehiculo', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar el mensaje en el div 'mensaje'
                document.getElementById('mensaje').innerHTML = data;

                // Reiniciar el formulario
                form.reset();
            })
            .catch(error => {
                document.getElementById('mensaje').innerHTML = 'Error al eliminar el vehículo.';
            });
        };
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
