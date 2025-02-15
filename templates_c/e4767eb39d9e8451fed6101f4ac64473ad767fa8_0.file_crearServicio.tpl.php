<?php
/* Smarty version 5.4.0, created on 2025-02-15 22:21:15
  from 'file:templates/crearServicio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1054b8e3d48_12368978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4767eb39d9e8451fed6101f4ac64473ad767fa8' => 
    array (
      0 => 'templates/crearServicio.tpl',
      1 => 1739654460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67b1054b8e3d48_12368978 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
   
    <?php $_smarty_tpl->assign('titulo', "Gestión de Clientes", false, NULL);?>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
        <a class="navbar-brand" href="#">
            <img src="/logo.png" alt="Logo" style="height: 70px;">
        </a>
        <div class="navbar-title mx-auto text-center text-white" ;">
            <?php echo $_smarty_tpl->getValue('titulo');?>

        </div>
    </nav>
    
    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">build</span>
                        <h3 class="mt-2">Registrar Servicio</h3>
                    </div>
                    <div class="card-body">
                        <form id="formCrearServicio" action="/index.php?action=crearServicio" method="post">
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="costo">Costo:</label>
                                <input type="number" class="form-control" id="costo" name="costo" step="0.01" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar Servicio</button>
                        </form>

                        <!-- Mensaje -->
                        <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
                            <div id="mensaje" class="message mt-3 alert alert-info">
                                <?php echo $_smarty_tpl->getValue('mensaje');?>

                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Volver al Menú -->
        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-sm">Volver al Menú</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-auto">
        <p>© 2025 Automotion - Todos los derechos reservados</p>
    </footer>

    <!-- Scripts de Bootstrap -->
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
