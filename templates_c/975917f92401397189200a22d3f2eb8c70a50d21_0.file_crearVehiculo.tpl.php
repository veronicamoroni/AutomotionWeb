<?php
/* Smarty version 5.4.0, created on 2025-01-24 21:44:07
  from 'file:templates/crearVehiculo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6793fb97947893_32040020',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '975917f92401397189200a22d3f2eb8c70a50d21' => 
    array (
      0 => 'templates/crearVehiculo.tpl',
      1 => 1737751418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_6793fb97947893_32040020 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Vehículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">

</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Alta de Vehículo</span>
            </div>

            <!-- Formulario de registro de vehículo -->
            <form id="formCrearVehiculo" action="/index.php?action=crearVehiculo" method="post">
                <div class="form-group">
                    <label for="patente">Patente:</label>
                    <input type="text" class="form-control" id="patente" name="patente" required>
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
                <button type="submit" class="btn btn-primary btn-block">Registrar Vehículo</button>
            </form>

            <!-- Área para mostrar mensajes de éxito o error -->
            <div id="mensaje" class="message"></div>
            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
            </div>
        </div>
    </div>

    <!-- JavaScript para manejar el reinicio del formulario y mostrar el mensaje -->
    <?php echo '<script'; ?>
>
        document.getElementById('formCrearVehiculo').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formCrearVehiculo');
            const formData = new FormData(form);

            fetch('/index.php?action=crearVehiculo', {
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
                document.getElementById('mensaje').innerHTML = 'Error al registrar el vehículo.';
            });
        };
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
