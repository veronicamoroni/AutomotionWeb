<?php
/* Smarty version 5.4.0, created on 2025-02-13 13:37:21
  from 'file:templates/eliminarTurno.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67ade781edabb7_26144560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a25ceb6a8173cdfda542c82683468499a7e3a94' => 
    array (
      0 => 'templates/eliminarTurno.tpl',
      1 => 1739300700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67ade781edabb7_26144560 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Turno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container centered-container d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <section class="col-md-8">
                <div class="text-center mb-4">
                   <h2>Eliminar Turno</h2>
                </div>
                <div class="card p-4 shadow">
                    <!-- Formulario de eliminación de turno -->
                    <form action="/index.php?action=eliminarTurno" method="post">
                        <!-- ID del turno a eliminar -->
                        <div class="form-group">
                            <label for="id">ID del Turno:</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>

                        <button type="submit" class="btn btn-danger btn-block">Eliminar Turno</button>
                    </form>

                    <!-- Mostrar mensajes de éxito o error -->
                    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
                        <div id="mensaje" class="message mt-3 alert alert-info">
                            <?php echo $_smarty_tpl->getValue('mensaje');?>

                        </div>
                    <?php }?>

                    <div class="text-center mt-3">
                        <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

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
