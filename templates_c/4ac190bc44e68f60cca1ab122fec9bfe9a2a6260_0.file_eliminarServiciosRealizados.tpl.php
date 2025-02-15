<?php
/* Smarty version 5.4.0, created on 2025-02-15 21:20:48
  from 'file:eliminarServiciosRealizados.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b0f720753927_85831347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ac190bc44e68f60cca1ab122fec9bfe9a2a6260' => 
    array (
      0 => 'eliminarServiciosRealizados.tpl',
      1 => 1739650840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67b0f720753927_85831347 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Servicio Realizado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <?php $_smarty_tpl->assign('titulo', "Gestión de Servicios", false, NULL);?>
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
                <div class="card shadow p-4">
                    <div class="card-header text-center">
                        <span class="material-symbols-outlined" style="font-size: 50px; color: #dc3545;">delete</span>
                        <h3 class="mt-2">Eliminar Servicio Realizado</h3>
                    </div>
                    <div class="card-body">
                        <form action="/index.php?action=eliminarServicioRealizado" method="post" onsubmit="return confirmarEliminacion();">
                            <div class="form-group">
                                <label for="id">ID del Servicio Realizado a Eliminar:</label>
                                <input type="text" class="form-control" id="id" name="id" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-lg btn-block">Eliminar Servicio</button>
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

    <!-- JavaScript para confirmación de eliminación -->
    <?php echo '<script'; ?>
>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este servicio realizado?");
        }
    <?php echo '</script'; ?>
>

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
