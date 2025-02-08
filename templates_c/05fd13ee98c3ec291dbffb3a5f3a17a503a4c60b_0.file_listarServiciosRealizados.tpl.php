<?php
/* Smarty version 5.4.0, created on 2025-02-08 21:28:48
  from 'file:listarServiciosRealizados.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67a7be80c11d17_31515407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05fd13ee98c3ec291dbffb3a5f3a17a503a4c60b' => 
    array (
      0 => 'listarServiciosRealizados.tpl',
      1 => 1739043398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67a7be80c11d17_31515407 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Servicios Realizados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Servicios Realizados</h1>

        <!-- Tabla para listar servicios realizados -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Turno_id</th>
                    <th>Fecha</th>
                    <th>hora</th>
                    <th>Servicio_id</th>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Servicio_id</th>
                    <th>Notas</th>
                   
                   
                </tr>
            </thead>
            <tbody>
               <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('servicios_realizados')) > 0) {?>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('servicios_realizados'), 'servicio_realizado');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('servicio_realizado')->value) {
$foreach0DoElse = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getValue('servicio_realizado')['servicio_id'];?>
</td> <!-- ID de la tabla servicios -->
                <td><?php echo $_smarty_tpl->getValue('servicio_realizado')['turno_id'];?>
</td> <!-- ID del turno -->
                <td><?php echo $_smarty_tpl->getValue('servicio_realizado')['fecha_turno'];?>
</td> <!-- Fecha del turno -->
                <td><?php echo $_smarty_tpl->getValue('servicio_realizado')['hora_turno'];?>
</td> <!-- Hora del turno -->
                <td><?php echo $_smarty_tpl->getValue('servicio_realizado')['servicio_id'];?>
</td> <!-- ID de la tabla servicios -->
                <td><?php echo $_smarty_tpl->getValue('servicio_realizado')['servicio_nombre'];?>
</td> <!-- Descripción del servicio -->
                <td><?php echo $_smarty_tpl->getValue('servicio_realizado')['costo'];?>
</td> <!-- Costo del servicio -->
                <td><?php echo $_smarty_tpl->getValue('servicio_realizado')['notas'];?>
</td>
               
            </tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <tr>
            <td colspan="7" class="text-center">No hay servicios realizados registrados.</td>
        </tr>
    <?php }?>
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
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
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
