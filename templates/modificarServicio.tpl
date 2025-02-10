<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow" style="width: 100%; max-width: 500px;">
            <h2 class="text-center mb-4">Modificar Servicio</h2>

            <!-- Formulario de modificación -->
            <form action="/index.php?action=modificarServicio" method="post">
                <div class="form-group">
                    <label for="id">ID del Servicio:</label>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción del Servicio:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="form-group">
                    <label for="costo">Costo:</label>
                    <input type="number" class="form-control" id="costo" name="costo" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Modificar Servicio</button>
            </form>

            <!-- Mostrar mensaje de éxito o error entre los botones -->
            {if isset($mensaje)}
                <div id="mensaje" class="message mt-3 alert alert-info">
                    {$mensaje}
                </div>
            {/if}

            <!-- Botón Volver al Menú -->
            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary">Volver al Menú</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
