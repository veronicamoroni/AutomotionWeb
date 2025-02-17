<?php
/* Smarty version 5.4.0, created on 2025-02-16 22:20:00
  from 'file:crearServicioRealizado.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b256805fec82_72928361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d2590c8ec559c4a49ce01cd73426f65414a3111' => 
    array (
      0 => 'crearServicioRealizado.tpl',
      1 => 1739732223,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67b256805fec82_72928361 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Servicio Realizado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    <?php $_smarty_tpl->assign('titulo', "Gestión de Servicios Realizados", false, NULL);?>
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
                        <h3 class="mt-2">Registrar Servicio Realizado</h3>
                    </div>
                    <div class="card-body">
                        <form action="/index.php?action=crearServicioRealizado" method="POST" id="formServicioRealizado">
                            
                            <!-- ID del Servicio -->
                            <div class="form-group">
                                <label for="servicios_id">ID del Servicio:</label>
                                <input type="number" class="form-control" id="servicios_id" name="servicios_id" required>
                            </div>

                            <!-- ID del Turno -->
                            <div class="form-group">
                                <label for="turnos_id">ID del Turno:</label>
                                <input type="number" class="form-control" id="turnos_id" name="turnos_id" required>
                            </div>

                            <!-- Notas -->
                            <div class="form-group">
                                <label for="notas">Notas:</label>
                                <textarea class="form-control" id="notas" name="notas" rows="3"></textarea>
                            </div>

                            <!-- Icono dentro del botón -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                <span class="material-symbols-outlined" style="font-size: 20px;">build</span> Registrar Servicio Realizado
                            </button>

                            <!-- Div para mostrar mensajes debajo del botón -->
                            <div id="mensaje" style="display: none;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Volver al Menú -->
        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-sm">Volver al Menú</a>
        </div>
    </div>

    <!-- Script para manejar el formulario -->
    <?php echo '<script'; ?>
>
        document.getElementById('formServicioRealizado').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario
    
            const form = document.getElementById('formServicioRealizado');
            const formData = new FormData(form);
    
            fetch('/index.php?action=crearServicioRealizado', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar el mensaje debajo del botón de registrar
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
                // En caso de error, mostrar el mensaje de error debajo del botón
                document.getElementById('mensaje').innerHTML = '<div class="alert alert-danger">Error al registrar el servicio realizado.</div>';
                document.getElementById('mensaje').style.display = "block";
            });
        };
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
