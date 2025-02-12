<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    {include file="navbar.tpl"}

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Eliminar Cliente</span>
            </div>

            <!-- Formulario de eliminación de cliente -->
            <form action="/index.php?action=eliminarCliente" method="post">
                <div class="form-group">
                    <label for="dni">DNI del cliente a Eliminar:</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <button type="submit" class="btn btn-danger btn-block">Eliminar Cliente</button>
            </form>

            <!-- Mostrar el mensaje de éxito o error entre los botones -->
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
