<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    {include file="navbar.tpl"}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Eliminar Servicio</h2>
                <div class="card p-4 shadow">
                    <form action="/index.php?action=eliminarServicio" method="post">
                        <div class="form-group">
                            <label for="id">ID del Servicio a Eliminar:</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block">Eliminar Servicio</button>
                        <div class="text-center mt-3">
                            <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
