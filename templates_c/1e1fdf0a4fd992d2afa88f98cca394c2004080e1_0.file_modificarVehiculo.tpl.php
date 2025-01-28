<?php
/* Smarty version 5.4.0, created on 2025-01-24 22:28:02
  from 'file:templates/modificarVehiculo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_679405e281e519_06479422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e1fdf0a4fd992d2afa88f98cca394c2004080e1' => 
    array (
      0 => 'templates/modificarVehiculo.tpl',
      1 => 1737745961,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_679405e281e519_06479422 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionW\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Vehículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <h3>Modificar Vehículo</h3>
            </div>

            <!-- Formulario de modificación de vehículo -->
            <form id="formModificarVehiculo" action="/index.php?action=modificarVehiculo" method="post">
                <div class="form-group">
                    <label for="patente">Patente Actual:</label>
                    <input type="text" class="form-control" id="patente" name="patente" placeholder="Ingrese la patente actual" required>
                </div>
                <div class="form-group">
                    <label for="nueva_patente">Nueva Patente:</label>
                    <input type="text" class="form-control" id="nueva_patente" name="nueva_patente" placeholder="Ingrese la nueva patente (opcional)">
                </div>
                <div class="form-group">
                    <label for="marca">Marca:</label>
                    <input type="text" class="form-control" id="marca" name="marca" required>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" required>
                </div>
                <div class="form-group">
                    <label for="dni_cliente">DNI del Cliente:</label>
                    <input type="text" class="form-control" id="dni_cliente" name="dni_cliente" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Modificar Vehículo</button>
            </form>

            <!-- Área para mostrar mensajes de éxito o error -->
            <div id="mensaje" class="message mt-3"></div>
        </div>
    </div>

    <!-- JavaScript para manejar el reinicio del formulario y mostrar el mensaje -->
    <?php echo '<script'; ?>
>
        document.getElementById('formModificarVehiculo').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formModificarVehiculo');
            const formData = new FormData(form);

            fetch('/index.php?action=modificarVehiculo', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar el mensaje en el div 'mensaje'
                document.getElementById('mensaje').innerHTML = data;

                // Reiniciar el formulario si fue exitoso
                if (data.includes('éxito')) {
                    form.reset();
                }
            })
            .catch(error => {
                document.getElementById('mensaje').innerHTML = 'Error al modificar el vehículo.';
            });
        };
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
