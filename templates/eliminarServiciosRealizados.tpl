<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Servicio Realizado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">
    {assign var="titulo" value="Gestión de Servicios Realizados"}
    {include file="navbar.tpl"}
  
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
                        <form id="formEliminarServicio" method="post">
                            <div class="form-group">
                                <label for="id">ID del Servicio Realizado a Eliminar:</label>
                                <input type="text" class="form-control" id="id" name="id" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-lg btn-block">
                                Eliminar Servicio
                            </button>
                        </form>

                        <!-- Mensaje -->
                        <div id="mensaje" class="message mt-3 alert alert-info" style="display:none;">
                            <!-- El mensaje se actualizará aquí -->
                        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script para eliminar servicio con fetch -->
    <script>
        document.getElementById('formEliminarServicio').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formEliminarServicio');
            const formData = new FormData(form);

            // Mostrar confirmación antes de enviar el formulario
            if (confirm("¿Estás seguro de que deseas eliminar este servicio realizado?")) {
                fetch('/index.php?action=eliminarServicioRealizado', {
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
                    form.reset(); // Resetea el formulario
                })
                .catch(error => {
                    // En caso de error, mostrar el mensaje de error
                    const mensajeDiv = document.getElementById('mensaje');
                    mensajeDiv.innerHTML = '<div class="alert alert-danger">Error al eliminar el servicio realizado.</div>';
                    mensajeDiv.style.display = "block";
                });
            }
        };
    </script>

</body>
</html>
