<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Vehículo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    {assign var="titulo" value="Gestión de Vehículos"}
    {include file="navbar.tpl"}

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #dc3545;">delete_forever</span>
                <h3 class="mt-2">Eliminar Vehículo</h3>
            </div>

            <form id="formEliminarVehiculo" action="/index.php?action=eliminarVehiculo" method="post">
                <div class="form-group">
                    <label for="patente">Patente del vehículo a eliminar:</label>
                    <input type="text" class="form-control" id="patente" name="patente" required>
                </div>
                <button type="submit" class="btn btn-danger w-100 mt-3">Eliminar Vehículo</button>
            </form>

            {if isset($mensaje)}
                <div id="mensaje" class="message mt-3 alert alert-info">
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
