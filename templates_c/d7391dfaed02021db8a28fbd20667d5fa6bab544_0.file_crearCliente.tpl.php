<?php
/* Smarty version 5.4.0, created on 2025-02-13 22:29:41
  from 'file:templates/crearCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67ae644596e630_05464158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7391dfaed02021db8a28fbd20667d5fa6bab544' => 
    array (
      0 => 'templates/crearCliente.tpl',
      1 => 1739482174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_67ae644596e630_05464158 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    <?php $_smarty_tpl->assign('titulo', "Gestión de Clientes", false, NULL);?>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">person_add</span>
                <h3 class="mt-2">Alta de Cliente</h3>
            </div>

            <!-- Formulario de registro de cliente -->
            <form id="formCrearCliente" action="/index.php?action=crearCliente" method="post">
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Registrar Cliente</button>
            </form>

            <!-- Mensaje de éxito o error (inicialmente oculto) -->
            <div id="mensaje" class="message mt-3 alert text-center" style="display: none;"></div>

            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary w-100">Volver al Menú</a>
            </div>
        </div>
    </div>

    <!-- JavaScript para manejar el formulario -->
    <?php echo '<script'; ?>
>
        document.getElementById('formCrearCliente').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formCrearCliente');
            const formData = new FormData(form);
            const mensajeDiv = document.getElementById('mensaje');

            fetch('/index.php?action=crearCliente', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar mensaje
                mensajeDiv.innerHTML = data;
                mensajeDiv.classList.add('alert-info'); // Estilo de Bootstrap para mensajes
                mensajeDiv.style.display = 'block';

                // Reiniciar formulario después de mostrar el mensaje
                form.reset();
            })
            .catch(error => {
                mensajeDiv.innerHTML = 'Error al registrar el cliente.';
                mensajeDiv.classList.add('alert-danger');
                mensajeDiv.style.display = 'block';
            });
        };
    <?php echo '</script'; ?>
>

    <?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

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
