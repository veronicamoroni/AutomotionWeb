<?php
/* Smarty version 5.4.0, created on 2025-02-16 15:00:37
  from 'file:templates/crearTurno.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1ef854c0172_93314879',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ec9c689850f14dbf0bccf47bcf94be997acaf8c' => 
    array (
      0 => 'templates/crearTurno.tpl',
      1 => 1739714432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
))) {
function content_67b1ef854c0172_93314879 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Turno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <?php $_smarty_tpl->assign('titulo', "Gestión de Turnos", false, NULL);?>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <div class="card-header text-center">
                        <!-- Agregar el ícono junto al título -->
                        <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">calendar_today</span>
                        <h3 class="mt-2">Registrar Turno</h3>
                    </div>

                    <!-- Formulario de registro de turno -->
                    <form id="formCrearTurno">
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="hora">Hora:</label>
                            <input type="time" class="form-control" id="hora" name="hora" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="patente">Patente del Vehículo:</label>
                            <input type="text" class="form-control" id="patente" name="patente" maxlength="7" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar Turno</button>
                    </form>

                    <!-- Mensaje de éxito o error -->
                    <div id="mensaje" class="message mt-3 alert alert-info text-center" style="display:none;">
                        <!-- El mensaje se actualizará aquí -->
                    </div>

                    <!-- Volver al Menú -->
                    <div class="text-center mt-3">
                        <a href="/menu" class="btn btn-secondary btn-sm">Volver al Menú</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-auto" style="background-color: #004085;">
        <p>© 2025 Automotion - Todos los derechos reservados</p>
    </footer>

    <!-- Script para enviar el formulario con fetch -->
    <?php echo '<script'; ?>
>
        document.getElementById('formCrearTurno').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formCrearTurno');
            const formData = new FormData(form);

            fetch('/index.php?action=crearTurno', {
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
                document.getElementById('mensaje').innerHTML = '<div class="alert alert-danger">Error al registrar el turno.</div>';
                document.getElementById('mensaje').style.display = "block";
            });
        };
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
