<?php
/* Smarty version 5.4.0, created on 2025-02-15 23:40:45
  from 'file:listarClientes.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b117edc95387_02915373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78003b82d23de4884fb81241a55df243f922c7bd' => 
    array (
      0 => 'listarClientes.tpl',
      1 => 1739659241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67b117edc95387_02915373 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    <?php $_smarty_tpl->assign('titulo', "Gestión de Clientes", false, NULL);?>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    

    <div class="container mt-5">
        <h1 class="text-center mb-4 text-white p-3 rounded" style="background: linear-gradient(to right, #007bff, #00c6ff);">
            Lista de Clientes
        </h1>
        
        <!-- Tabla para listar clientes -->
        <div class="table-responsive shadow-lg p-3 bg-white rounded">
            <table class="table table-striped table-hover table-bordered">
                <thead class="bg-secondary text-white">
                    <tr class="text-center">
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                      
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
                            <tr class="text-center">
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
                               
                            </tr>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger fw-bold">No hay clientes registrados.</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="/menu" class="btn btn-secondary btn-lg">Volver al Menú</a>
        </div>
    </div>

   

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
