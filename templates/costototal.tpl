<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Costo del Turno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Consultar Costo del Turno</h2>
        <form action="/index.php?action=costoTotal" method="POST">
            <div class="form-group">
                <label for="turnos_id">ID del Turno:</label>
                <input type="text" class="form-control" id="turnos_id" name="turnos_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
    </div>
</body>
</html>