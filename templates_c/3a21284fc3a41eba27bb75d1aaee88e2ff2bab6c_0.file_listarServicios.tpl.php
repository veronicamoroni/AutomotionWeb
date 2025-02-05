<?php
/* Smarty version 5.4.0, created on 2025-02-05 20:13:35
  from 'file:listarServicios.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67a3b85f23b503_70829011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a21284fc3a41eba27bb75d1aaee88e2ff2bab6c' => 
    array (
      0 => 'listarServicios.tpl',
      1 => 1738780121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67a3b85f23b503_70829011 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Servicios</h1>

        <!-- Tabla para listar servicios -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Costo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('servicios')) > 0) {?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('servicios'), 'servicio');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('servicio')->value) {
$foreach0DoElse = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getValue('servicio')['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('servicio')['descripcion'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('servicio')['costo'];?>
</td>
                            <td>
                                <!-- Botón para eliminar servicio -->
                                <form method="POST" action="eliminar_servicio.php" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('servicio')['id'];?>
">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay servicios registrados.</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
        </div>
    </div>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
