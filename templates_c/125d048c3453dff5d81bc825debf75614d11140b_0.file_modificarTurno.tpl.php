<?php
/* Smarty version 5.4.0, created on 2025-02-16 15:08:38
  from 'file:templates/modificarTurno.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b1f166899ed7_89172773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '125d048c3453dff5d81bc825debf75614d11140b' => 
    array (
      0 => 'templates/modificarTurno.tpl',
      1 => 1739714914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67b1f166899ed7_89172773 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Turno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
        <a class="navbar-brand" href="/">
            <img src="logo.png" alt="Logo" height="70">
        </a>
        <div class="navbar-title text-white mx-auto">Actualizar Turno</div>
    </nav>

    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <!-- Agregar el ícono junto al título -->
                        <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">edit</span>
                        <h3 class="mt-2">Actualizar Turno</h3>
                    </div>
                    <div class="card-body">
                        <!-- Formulario de actualización de turno -->
                        <form id="formActualizarTurno" action="/index.php?action=modificarTurno" method="post">
                            <div class="form-group">
                                <label for="id">ID del Turno:</label>
                                <input type="text" class="form-control" id="id" name="id" required>
                            </div>
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
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="patente">Patente del Vehículo:</label>
                                <input type="text" class="form-control" id="patente" name="patente" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar Turno</button>
                        </form>

                        <!-- Mensaje de éxito o error -->
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
    <footer style="background-color: #004085;" class="text-white text-center py-3 mt-auto">
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
        document.getElementById('formActualizarTurno').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formActualizarTurno');
            const formData = new FormData(form);

            fetch('/index.php?action=modificarTurno', {
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
                document.getElementById('mensaje').innerHTML = '<div class="alert alert-danger">Error al actualizar el turno.</div>';
                document.getElementById('mensaje').style.display = "block";
            });
        };
    <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
