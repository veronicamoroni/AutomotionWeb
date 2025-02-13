<?php
/* Smarty version 5.4.0, created on 2025-02-13 13:36:53
  from 'file:templates/eliminarVehiculo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67ade7651e11e7_23261596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e654a0e3d07af879d3efb046840e664f3064dc1d' => 
    array (
      0 => 'templates/eliminarVehiculo.tpl',
      1 => 1739192916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67ade7651e11e7_23261596 (\Smarty\Template $_smarty_tpl) {
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
