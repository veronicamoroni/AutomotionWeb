<?php
/* Smarty version 5.4.0, created on 2025-02-15 22:56:47
  from 'file:templates/modificarCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b10d9f31f6f7_09656451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7997e0d39172e50eb07aee944d712f5b36927b65' => 
    array (
      0 => 'templates/modificarCliente.tpl',
      1 => 1739656599,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67b10d9f31f6f7_09656451 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <?php $_smarty_tpl->assign('titulo', "Gestión de Clientes", false, NULL);?>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <div class="text-center mb-4">
                        <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">edit</span>
                        <h3 class="mt-2">Actualizar Cliente</h3>
                    </div>

                    <!-- Formulario de actualización de cliente -->
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
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar Cliente</button>
                    </form>

                    <!-- Mostrar mensajes de éxito o error -->
                    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
                        <div id="mensaje" class="message mt-3 alert alert-info">
                            <?php echo $_smarty_tpl->getValue('mensaje');?>

                        </div>
                    <?php }?>

                    <!-- Volver al Menú -->
                    <div class="text-center mt-3">
                        <a href="/menu" class="btn btn-secondary btn-sm">Volver al Menú</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-auto" style="background-color: #004085;">
        <p>© 2025 Automotion - Todos los derechos reservados</p>
    </footer>

    <!-- Scripts de Bootstrap -->
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
