<?php
/* Smarty version 5.4.0, created on 2025-01-27 22:04:46
  from 'file:templates/modificarCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6797f4eee1dd35_02881285',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7997e0d39172e50eb07aee944d712f5b36927b65' => 
    array (
      0 => 'templates/modificarCliente.tpl',
      1 => 1737981015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_6797f4eee1dd35_02881285 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Editar Cliente</span>
            </div>
          
            <!-- Formulario de actualización de cliente -->
            <form id="formActualizarCliente" action="/index.php?action=modificarCliente" method="post">
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Actualizar Cliente</button>
            </form>

            <!-- Área para mostrar mensajes de éxito o error -->
            <div id="mensaje" class="message"></div>
            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
            </div>
        </div>
    </div>

    <!-- JavaScript para manejar el envío del formulario y mostrar mensajes -->
    <?php echo '<script'; ?>
>
        document.getElementById('formActualizarCliente').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formActualizarCliente');
            const formData = new FormData(form);

            fetch('/index.php?action=modificarCliente', {
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
                document.getElementById('mensaje').innerHTML = 'Error al actualizar el cliente.';
            });
        };
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>

<?php }
}
