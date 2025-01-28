<?php
/* Smarty version 5.4.0, created on 2025-01-27 01:44:31
  from 'file:listarClientes.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6796d6ef864035_74938621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78003b82d23de4884fb81241a55df243f922c7bd' => 
    array (
      0 => 'listarClientes.tpl',
      1 => 1737938287,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6796d6ef864035_74938621 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Clientes</h1>

        <!-- Tabla para listar clientes -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('clientes')) > 0) {?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('clientes'), 'cliente');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cliente')->value) {
$foreach0DoElse = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getValue('cliente')['dni'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('cliente')['nombre'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('cliente')['apellido'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('cliente')['telefono'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('cliente')['email'];?>
</td>
                            <td>
                                <!-- Botón para eliminar cliente -->
                                <form method="POST" action="eliminar_cliente.php" class="d-inline">
                                    <input type="hidden" name="dni" value="<?php echo $_smarty_tpl->getValue('cliente')['dni'];?>
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
                        <td colspan="6" class="text-center">No hay clientes registrados.</td>
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
