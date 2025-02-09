<?php
/* Smarty version 5.4.0, created on 2025-02-09 22:39:47
  from 'file:eliminarServiciosRealizados.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67a920a37e0687_58985386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ac190bc44e68f60cca1ab122fec9bfe9a2a6260' => 
    array (
      0 => 'eliminarServiciosRealizados.tpl',
      1 => 1739137057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67a920a37e0687_58985386 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Servicio Realizado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Eliminar Servicio Realizado</h2>
                <div class="card p-4 shadow">
                    <form action="/index.php?action=eliminarServicioRealizado" method="post" onsubmit="return confirmarEliminacion();">
                        <div class="form-group">
                            <label for="id">ID del Servicio Realizado a Eliminar:</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block">Eliminar Servicio</button>
                        <div class="text-center mt-3">
                            <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este servicio realizado?");
        }
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
