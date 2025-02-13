<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    {assign var="titulo" value="Gestión de Clientes"}
    {include file="navbar.tpl"}

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;"> <!-- Se añadió el estilo shadow-lg y max-width -->
            <div class="text-center mb-4">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #007bff;">edit</span> <!-- Icono edit -->
                <h3 class="mt-2">Actualizar Cliente</h3>
            </div>
          
            <!-- Formulario de actualización de cliente -->
            <form id="formActualizarCliente" action="/index.php?action=modificarCliente" method="post">
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" value="{if isset($cliente)}{$cliente.dni}{/if}" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{if isset($cliente)}{$cliente.telefono}{/if}" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{if isset($cliente)}{$cliente.email}{/if}" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Actualizar Cliente</button> <!-- Se añadió la clase w-100 y mt-3 -->
            </form>

            <!-- mostrar mensajes de éxito o error -->
            {if isset($mensaje)}
                <div id="mensaje" class="message mt-3 alert alert-info text-center">
                    {$mensaje}
                </div>
            {/if}

            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary w-100">Volver al Menú</a> <!-- Se añadió la clase w-100 -->
            </div>
        </div>
    </div>

    {include file="footer.tpl"}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

