<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Vehículo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    {assign var="titulo" value="Gestión de Vehículos"}
    {include file="navbar.tpl"}

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">directions_car</span>
                <h3 class="mt-2">Modificar Vehículo</h3>
            </div>

            <!-- Formulario de modificación de vehículo -->
            <form id="formModificarVehiculo" action="/index.php?action=modificarVehiculo" method="post">
                <div class="form-group">
                    <label for="patente">Patente Actual:</label>
                    <input type="text" class="form-control" id="patente" name="patente" value="{if isset($vehiculo)}{$vehiculo.patente}{/if}" required>
                </div>
                <div class="form-group">
                    <label for="nueva_patente">Nueva Patente:</label>
                    <input type="text" class="form-control" id="nueva_patente" name="nueva_patente" placeholder="Opcional">
                </div>
                <div class="form-group">
                    <label for="marca">Marca:</label>
                    <input type="text" class="form-control" id="marca" name="marca" value="{if isset($vehiculo)}{$vehiculo.marca}{/if}" required>
                </div>
                <div class="form-group">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" value="{if isset($vehiculo)}{$vehiculo.modelo}{/if}" required>
                </div>
                <div class="form-group">
                    <label for="dni_cliente">DNI del Cliente:</label>
                    <input type="text" class="form-control" id="dni_cliente" name="dni_cliente" value="{if isset($vehiculo)}{$vehiculo.dni_cliente}{/if}" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Modificar Vehículo</button>
            </form>

            <!-- Mostrar mensaje de éxito o error -->
            {if isset($mensaje)}
                <div id="mensaje" class="message mt-3 alert alert-info text-center">
                    {$mensaje}
                </div>
            {/if}

            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary w-100">Volver al Menú</a>
            </div>
        </div>
    </div>

    {include file="footer.tpl"}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
