<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Vehículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    {include file="navbar.tpl"}

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Alta de Vehículo</span>
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
                <button type="submit" class="btn btn-primary btn-block">Registrar Vehículo</button>
            </form>

            <!-- Mostrar mensaje de éxito o error -->
            {if isset($mensaje)}
                <div id="mensaje" class="message mt-3 alert alert-info">
                    {$mensaje}
                </div>
            {/if}

            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
