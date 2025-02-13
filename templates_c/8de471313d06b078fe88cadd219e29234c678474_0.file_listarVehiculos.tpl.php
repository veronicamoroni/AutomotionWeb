<?php
/* Smarty version 5.4.0, created on 2025-02-13 14:28:10
  from 'file:listarVehiculos.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67adf36a893735_98625875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8de471313d06b078fe88cadd219e29234c678474' => 
    array (
      0 => 'listarVehiculos.tpl',
      1 => 1739452965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_67adf36a893735_98625875 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/templates/styles/Formulario.css"> 
</head>
<body class="bg-light">
    <?php $_smarty_tpl->assign('titulo', "Gestión de Vehículos", false, NULL);
$_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    
<div class="container mt-5">
    <h1 class="text-center mb-4 text-white p-3 rounded" style="background: linear-gradient(to right, #007bff, #00c6ff);">
        Lista de Vehiculos
    </h1>

        <!-- Tabla para listar vehículos con estilos mejorados -->
        <div class="table-responsive shadow-lg p-3 bg-white rounded">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-secondary text-white text-center">
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>DNI del Cliente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('vehiculos')) > 0) {?>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('vehiculos'), 'vehiculo');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('vehiculo')->value) {
$foreach0DoElse = false;
?>
                            <tr class="text-center">
                                <td><?php echo $_smarty_tpl->getValue('vehiculo')['patente'];?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('vehiculo')['marca'];?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('vehiculo')['modelo'];?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('vehiculo')['dni_cliente'];?>
</td>
                                
                            </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center text-danger fw-bold">No hay vehículos registrados.</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-lg">Volver al Menú</a>
        </div>
    </div>

    <?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
