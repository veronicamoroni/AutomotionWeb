<?php
/* Smarty version 5.4.0, created on 2025-02-13 22:32:57
  from 'file:templates/modificarCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67ae6509b0e8b5_19999027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7997e0d39172e50eb07aee944d712f5b36927b65' => 
    array (
      0 => 'templates/modificarCliente.tpl',
      1 => 1739482369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_67ae6509b0e8b5_19999027 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
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
                <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">edit</span>
                <h3 class="mt-2">Actualizar Cliente</h3>
            </div>
          
            <form id="formActualizarCliente" action="/index.php?action=modificarCliente" method="post">
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="<?php if ((null !== ($_smarty_tpl->getValue('cliente') ?? null))) {
echo $_smarty_tpl->getValue('cliente')['dni'];
}?>" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php if ((null !== ($_smarty_tpl->getValue('cliente') ?? null))) {
echo $_smarty_tpl->getValue('cliente')['telefono'];
}?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php if ((null !== ($_smarty_tpl->getValue('cliente') ?? null))) {
echo $_smarty_tpl->getValue('cliente')['email'];
}?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Actualizar Cliente</button>
            </form>

            <div id="mensaje" class="message mt-3 alert text-center" style="display: none;"></div>

            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary w-100">Volver al Menú</a>
            </div>
        </div>
    </div>

    <?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <?php echo '<script'; ?>
>
        document.getElementById('formActualizarCliente').onsubmit = function(event) {
            event.preventDefault();

            const form = document.getElementById('formActualizarCliente');
            const formData = new FormData(form);
            const mensajeDiv = document.getElementById('mensaje');

            fetch('/index.php?action=modificarCliente', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                mensajeDiv.innerHTML = data;
                mensajeDiv.classList.add('alert-info');
                mensajeDiv.style.display = 'block';
                form.reset();
            })
            .catch(error => {
                mensajeDiv.innerHTML = 'Error al actualizar el cliente.';
                mensajeDiv.classList.add('alert-danger');
                mensajeDiv.style.display = 'block';
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
