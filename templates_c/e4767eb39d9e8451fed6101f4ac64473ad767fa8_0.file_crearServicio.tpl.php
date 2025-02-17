<?php
/* Smarty version 5.4.0, created on 2025-02-16 15:16:14
  from 'file:templates/crearServicio.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1f32e613b46_52507615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4767eb39d9e8451fed6101f4ac64473ad767fa8' => 
    array (
      0 => 'templates/crearServicio.tpl',
      1 => 1739715370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67b1f32e613b46_52507615 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php $_smarty_tpl->assign('titulo', "Gestión de Servicios", false, NULL);?>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    
    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <!-- Icono junto al título -->
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
                            <!-- Icono dentro del botón -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <span class="material-symbols-outlined" style="font-size: 20px;">build</span> Registrar Servicio
                            </button>
                        </form>

                        <!-- Mensaje -->
                        <div id="mensaje" class="message mt-3" style="display: none;"></div>
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

    <!-- Script para enviar el formulario con fetch -->
    <?php echo '<script'; ?>
>
        document.getElementById('formCrearServicio').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formCrearServicio');
            const formData = new FormData(form);

            fetch('/index.php?action=crearServicio', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar el mensaje en el div 'mensaje'
                const mensajeDiv = document.getElementById('mensaje');
                mensajeDiv.innerHTML = data;
                mensajeDiv.style.display = "block"; // Muestra el mensaje
                mensajeDiv.className = "alert alert-info"; // Aplica estilos al mensaje

                // Si el mensaje no contiene "Error", puedes reiniciar el formulario
                if (!data.includes("Error")) {
                    form.reset();
                }
            })
            .catch(error => {
                // En caso de error, mostrar el mensaje de error
                const mensajeDiv = document.getElementById('mensaje');
                mensajeDiv.innerHTML = '<div class="alert alert-danger">Error al registrar el servicio.</div>';
                mensajeDiv.style.display = "block";
            });
        };
    <?php echo '</script'; ?>
>

</body>
</html>


<?php }
}
