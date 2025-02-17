<?php
/* Smarty version 5.4.0, created on 2025-02-17 00:50:00
  from 'file:templates/costototal.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b279a82abbb2_46872624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0042aefd048f95010752c67722a80bfdeba2a980' => 
    array (
      0 => 'templates/costototal.tpl',
      1 => 1739749795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67b279a82abbb2_46872624 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Costo del Turno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Consultar Costo del Turno</h2>
        <form action="/index.php?action=costoTotal" method="POST">
            <div class="form-group">
                <label for="turnos_id">ID del Turno:</label>
                <input type="text" class="form-control" id="turnos_id" name="turnos_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
    </div>
</body>
</html><?php }
}
