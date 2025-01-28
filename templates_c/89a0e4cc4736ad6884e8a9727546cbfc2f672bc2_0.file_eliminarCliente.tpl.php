<?php
/* Smarty version 5.4.0, created on 2025-01-24 21:45:36
  from 'file:templates/eliminarCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6793fbf0c8d0c0_26357333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89a0e4cc4736ad6884e8a9727546cbfc2f672bc2' => 
    array (
      0 => 'templates/eliminarCliente.tpl',
      1 => 1737751490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_6793fbf0c8d0c0_26357333 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
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
                  
                </div>
                <div class="card p-4 shadow">
                    <form action="/index.php?action=eliminarCliente" method="post">
                        <div class="form-group">
                            <label for="id">DNI del cliente a Eliminar:</label>
                            <input type="text" class="form-control" id="dni" name="dni" required>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block">Eliminar Usuario</button>
                        <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
            </div>
                    </form>
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
