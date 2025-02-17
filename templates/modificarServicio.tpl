<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="d-flex flex-column min-vh-100">

    {assign var="titulo" value="Gestión de Servicios"}
    {include file="navbar.tpl"}

    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <!-- Icono junto al título -->
                        <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">build</span>
                        <h3 class="mt-2">Modificar Servicio</h3>
                    </div>
                    <div class="card-body">
                        <form id="formModificarServicio" action="/index.php?action=modificarServicio" method="post">
                            <div class="form-group">
                                <label for="id">ID del Servicio:</label>
                                <input type="text" class="form-control" id="id" name="id" required>
                            </div>
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
                                <span class="material-symbols-outlined" style="font-size: 20px;">edit</span> Modificar Servicio
                            </button>
                        </form>

                        <!-- Mensaje -->
                        <div id="mensaje" class="message mt-3" style="display:none;"></div>
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

    <!-- Script para enviar el formulario con fetch -->
    <script>
        document.getElementById('formModificarServicio').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formModificarServicio');
            const formData = new FormData(form);

            fetch('/index.php?action=modificarServicio', {
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
                document.getElementById('mensaje').innerHTML = '<div class="alert alert-danger">Error al modificar el servicio.</div>';
                document.getElementById('mensaje').style.display = "block";
            });
        };
    </script>
</body>
</html>
