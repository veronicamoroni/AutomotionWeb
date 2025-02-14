<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Vehículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    {assign var="titulo" value="Gestión de Vehículos"}
    {include file="navbar.tpl"}

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">directions_car</span>
                <h3 class="mt-2">Alta de Vehículo</h3>
            </div>

            <!-- Formulario para crear vehículo -->
            <form id="formCrearVehiculo" action="/index.php?action=crearVehiculo" method="post">
                <div class="form-group">
                    <label for="patente">Patente:</label>
                    <input type="text" class="form-control" id="patente" name="patente" required>
                </div>
                <div class="form-group">
                    <label for="marca">Marca:</label>
                    <input type="text" class="form-control" id="marca" name="marca" required>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" required>
                </div>
                <div class="form-group">
                    <label for="dni_cliente">DNI del Cliente:</label>
                    <input type="text" class="form-control" id="dni_cliente" name="dni_cliente" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Registrar Vehículo</button>
            </form>

            <!-- Mostrar mensaje de éxito o error -->
            <div id="mensaje" class="mt-3 text-center"></div>

            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary w-100">Volver al Menú</a>
            </div>
        </div>
    </div>

    {include file="footer.tpl"}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript para manejar el envío del formulario y mostrar el mensaje -->
    <script>
        document.getElementById('formCrearVehiculo').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario

            const form = document.getElementById('formCrearVehiculo');
            const formData = new FormData(form);

            fetch('/index.php?action=crearVehiculo', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar el mensaje en el div 'mensaje'
                const mensajeDiv = document.getElementById('mensaje');
                mensajeDiv.innerHTML = data;
                mensajeDiv.className = "alert alert-info"; // Aplica estilos al mensaje

                // Reiniciar el formulario si el mensaje no indica error
                if (!data.includes("Error")) {
                    form.reset();
                }
            })
            .catch(error => {
                document.getElementById('mensaje').innerHTML = '<div class="alert alert-danger">Error al registrar el vehículo.</div>';
            });
        };
    </script>
</body>
</html>
