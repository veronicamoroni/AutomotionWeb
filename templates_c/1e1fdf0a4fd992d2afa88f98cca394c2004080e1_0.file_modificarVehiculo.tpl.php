<?php
/* Smarty version 5.4.0, created on 2025-02-13 14:37:03
  from 'file:templates/modificarVehiculo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67adf57fe83bf6_42260924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e1fdf0a4fd992d2afa88f98cca394c2004080e1' => 
    array (
      0 => 'templates/modificarVehiculo.tpl',
      1 => 1739453779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_67adf57fe83bf6_42260924 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Vehículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    <?php $_smarty_tpl->assign('titulo', "Gestión de Vehículos", false, NULL);?>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">directions_car</span>
                <h3 class="mt-2">Modificar Vehículo</h3>
            </div>

            <!-- Formulario de modificación de vehículo -->
            <form id="formModificarVehiculo" action="/index.php?action=modificarVehiculo" method="post">
                <div class="form-group">
                    <label for="patente">Patente Actual:</label>
                    <input type="text" class="form-control" id="patente" name="patente" value="<?php if ((null !== ($_smarty_tpl->getValue('vehiculo') ?? null))) {
echo $_smarty_tpl->getValue('vehiculo')['patente'];
}?>" required>
                </div>
                <div class="form-group">
                    <label for="nueva_patente">Nueva Patente:</label>
                    <input type="text" class="form-control" id="nueva_patente" name="nueva_patente" placeholder="Opcional">
                </div>
                <div class="form-group">
                    <label for="marca">Marca:</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="<?php if ((null !== ($_smarty_tpl->getValue('vehiculo') ?? null))) {
echo $_smarty_tpl->getValue('vehiculo')['marca'];
}?>" required>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?php if ((null !== ($_smarty_tpl->getValue('vehiculo') ?? null))) {
echo $_smarty_tpl->getValue('vehiculo')['modelo'];
}?>" required>
                </div>
                <div class="form-group">
                    <label for="dni_cliente">DNI del Cliente:</label>
                    <input type="text" class="form-control" id="dni_cliente" name="dni_cliente" value="<?php if ((null !== ($_smarty_tpl->getValue('vehiculo') ?? null))) {
echo $_smarty_tpl->getValue('vehiculo')['dni_cliente'];
}?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Modificar Vehículo</button>
            </form>

            <!-- Mostrar mensaje de éxito o error -->
            <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
                <div id="mensaje" class="message mt-3 alert alert-info text-center">
                    <?php echo $_smarty_tpl->getValue('mensaje');?>

                </div>
            <?php }?>

            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary w-100">Volver al Menú</a>
            </div>
        </div>
    </div>

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
