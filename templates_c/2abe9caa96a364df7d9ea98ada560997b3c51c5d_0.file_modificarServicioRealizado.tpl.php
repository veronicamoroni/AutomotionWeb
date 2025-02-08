<?php
/* Smarty version 5.4.0, created on 2025-02-08 20:37:23
  from 'file:modificarServicioRealizado.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67a7b273ba9b66_48138566',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2abe9caa96a364df7d9ea98ada560997b3c51c5d' => 
    array (
      0 => 'modificarServicioRealizado.tpl',
      1 => 1739042585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67a7b273ba9b66_48138566 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Servicio Realizado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Editar Servicio Realizado</span>
            </div>
          
            <!-- Formulario de actualización de servicio realizado -->
            <form id="formmodificarServicioRealizado" action="/index.php?action=modificarServicioRealizado" method="post">
                <div class="form-group">
                    <label for="servicios_realizados_id">ID Servicio Realizado:</label>
                    <input type="text" class="form-control" id="servicios_realizados_id" name="servicios_realizados_id" required>
                </div>

                <div class="form-group">
                    <label for="turnos_id">ID Turno:</label>
                    <input type="text" class="form-control" id="turnos_id" name="turnos_id" required>
                </div>
                <div class="form-group">
                    <label for="servicios_id">ID Servicio:</label>
                    <input type="text" class="form-control" id="servicios_id" name="servicios_id" required>
                </div>
                <div class="form-group">
                    <label for="notas">Notas del servicio:</label>
                    <textarea class="form-control" id="notas" name="notas" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Actualizar Servicio Realizado</button>
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
        document.getElementById('formmodificarServicioRealizado').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formmodificarServicioRealizado')

            const formData = new FormData(form);

            fetch('/index.php?action=modificarServicioRealizado', {
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
                document.getElementById('mensaje').innerHTML = 'Error al actualizar el servicio.';
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
