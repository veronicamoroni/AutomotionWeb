<?php
/* Smarty version 5.4.0, created on 2025-02-14 22:06:33
  from 'file:eliminarServicio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67afb059563586_84820547',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb12c31964ad61211ee9fd7ec957056f80fa33da' => 
    array (
      0 => 'eliminarServicio.tpl',
      1 => 1739300700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67afb059563586_84820547 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Eliminar Servicio</span>
            </div>

            <!-- Formulario para eliminar servicio -->
            <form id="formEliminarServicio" action="/index.php?action=eliminarServicio" method="post">
                <div class="form-group">
                    <label for="id">ID del Servicio:</label>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
                <button type="submit" class="btn btn-danger btn-block">Eliminar Servicio</button>
            </form>

            <!-- Mostrar mensaje de éxito o error -->
            <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
                <div id="mensaje" class="message mt-3 alert alert-info">
                    <?php echo $_smarty_tpl->getValue('mensaje');?>

                </div>
            <?php }?>

            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
            </div>
        </div>
    </div>

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
