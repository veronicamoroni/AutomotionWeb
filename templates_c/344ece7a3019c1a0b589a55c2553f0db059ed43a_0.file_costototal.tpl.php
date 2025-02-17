<?php
/* Smarty version 5.4.0, created on 2025-02-17 00:41:03
  from 'file:costototal.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b2778fbf0020_85383815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '344ece7a3019c1a0b589a55c2553f0db059ed43a' => 
    array (
      0 => 'costototal.tpl',
      1 => 1739749259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67b2778fbf0020_85383815 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Turno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php if ((null !== ($_smarty_tpl->getValue('detalleTurno') ?? null))) {?>
            <h2>Detalles del Turno</h2>
            <p><strong>ID del Turno:</strong> <?php echo $_smarty_tpl->getValue('detalleTurno')['turnos_id'];?>
</p>
            <p><strong>Fecha:</strong> <?php echo $_smarty_tpl->getValue('detalleTurno')['fecha'];?>
</p>
            <p><strong>Hora:</strong> <?php echo $_smarty_tpl->getValue('detalleTurno')['hora'];?>
</p>
            <p><strong>Descripción:</strong> <?php echo $_smarty_tpl->getValue('detalleTurno')['descripcion_turno'];?>
</p>
            <p><strong>Patente del Vehículo:</strong> <?php echo $_smarty_tpl->getValue('detalleTurno')['patente'];?>
</p>
            <p><strong>Cliente:</strong> <?php echo $_smarty_tpl->getValue('detalleTurno')['cliente'];?>
</p>
            <p><strong>Costo Total:</strong> \$<?php echo $_smarty_tpl->getValue('detalleTurno')['total_gastado'];?>
</p>
        <?php } elseif ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
            <div class="alert alert-warning">
                <?php echo $_smarty_tpl->getValue('mensaje');?>

            </div>
        <?php }?>
        <a href="formulario_turno.html" class="btn btn-secondary">Volver al Formulario</a>
    </div>
</body>
</html><?php }
}
