<?php
/* Smarty version 5.4.0, created on 2025-02-16 00:19:29
  from 'file:templates/eliminarCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b12101c730f5_90692453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89a0e4cc4736ad6884e8a9727546cbfc2f672bc2' => 
    array (
      0 => 'templates/eliminarCliente.tpl',
      1 => 1739661566,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67b12101c730f5_90692453 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Navbar -->
    <?php $_smarty_tpl->assign('titulo', "Gestión de Clientes", false, NULL);?>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
        <a class="navbar-brand" href="#">
            <img src="/logo.png" alt="Logo" style="height: 70px;">
        </a>
        <div class="navbar-title mx-auto text-center text-white">
            <?php echo $_smarty_tpl->getValue('titulo');?>

        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <div class="card-header text-center">
                        <span class="material-symbols-outlined" style="font-size: 50px; color: #dc3545;">delete_forever</span>
                        <h3 class="mt-2">Eliminar Cliente</h3>
                    </div>
                    <div class="card-body">
                        <form action="/index.php?action=eliminarCliente" method="post" onsubmit="return confirmarEliminacion();">
                            <div class="form-group">
                                <label for="dni">DNI del cliente a Eliminar:</label>
                                <input type="text" class="form-control" id="dni" name="dni" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-lg btn-block mt-3">Eliminar Usuario</button>
                        </form>

                        <!-- Mensaje de respuesta -->
                        <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
                            <div id="mensaje" class="message mt-3 alert alert-info text-center">
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

   

    <!-- JavaScript para confirmación de eliminación -->
    <?php echo '<script'; ?>
>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este cliente?");
        }
    <?php echo '</script'; ?>
>
    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-auto" style="background-color: #004085;">
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
