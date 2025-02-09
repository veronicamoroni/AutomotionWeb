<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    {include file="navbar.tpl"}

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Editar Cliente</span>
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
                <button type="submit" class="btn btn-primary btn-block">Actualizar Cliente</button>
            </form>

            <!-- mostrar mensajes de éxito o error -->
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

</body>
</html>
