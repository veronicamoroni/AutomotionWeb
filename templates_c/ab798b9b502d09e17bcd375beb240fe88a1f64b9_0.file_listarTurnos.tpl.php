<?php
/* Smarty version 5.4.0, created on 2025-02-09 22:41:02
  from 'file:listarTurnos.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67a920ee53e981_61856957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab798b9b502d09e17bcd375beb240fe88a1f64b9' => 
    array (
      0 => 'listarTurnos.tpl',
      1 => 1738947536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67a920ee53e981_61856957 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Turnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Turnos</h1>

        <!-- Tabla para listar turnos -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Descripción</th>
                    <th>Patente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('turnos')) > 0) {?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('turnos'), 'turno');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('turno')->value) {
$foreach0DoElse = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getValue('turno')['id'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('turno')['fecha'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('turno')['hora'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('turno')['descripcion'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('turno')['patente'];?>
</td>
                            <td>
                                <!-- Botón para eliminar turno -->
                                <form method="POST" action="eliminar_turno.php" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('turno')['id'];?>
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
                        <td colspan="6" class="text-center">No hay turnos registrados.</td>
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
