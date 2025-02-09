<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    {include file="navbar.tpl"}
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Alta de Servicio</span>
            </div>

            <form id="formCrearServicio" action="/index.php?action=crearServicio" method="post">
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="costo">Costo:</label>
                    <input type="number" class="form-control" id="costo" name="costo" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar Servicio</button>
            </form>

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
