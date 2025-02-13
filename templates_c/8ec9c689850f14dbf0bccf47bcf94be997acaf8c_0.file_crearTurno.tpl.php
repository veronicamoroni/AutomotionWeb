<?php
/* Smarty version 5.4.0, created on 2025-02-13 20:48:35
  from 'file:templates/crearTurno.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67ae4c93e5b350_05436111',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ec9c689850f14dbf0bccf47bcf94be997acaf8c' => 
    array (
      0 => 'templates/crearTurno.tpl',
      1 => 1739300700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67ae4c93e5b350_05436111 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Turno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Alta de Turno</span>
            </div>

            <!-- Formulario de registro de turno -->
            <form id="formCrearTurno" action="/index.php?action=crearTurno" method="post">
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="form-group">
                    <label for="hora">Hora:</label>
                    <input type="time" class="form-control" id="hora" name="hora" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="patente">Patente del Vehículo:</label>
                    <input type="text" class="form-control" id="patente" name="patente" maxlength="7" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar Turno</button>
            </form>

            <!-- Mostrar mensajes de éxito o error -->
            <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null)) && $_smarty_tpl->getValue('mensaje') != '') {?>
                <div class="alert alert-info mt-3">
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
