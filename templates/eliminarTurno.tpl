<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Turno</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles.css">
</head>
<body>
    {include file="navbar.tpl"}

    <div class="container centered-container d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <section class="col-md-8">
                <div class="text-center mb-4">
                   <h2>Eliminar Turno</h2>
                </div>
                <div class="card p-4 shadow">
                    <!-- Formulario de eliminación de turno -->
                    <form action="/index.php?action=eliminarTurno" method="post">
                        <!-- ID del turno a eliminar -->
                        <div class="form-group">
                            <label for="id">ID del Turno:</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>

                        <button type="submit" class="btn btn-danger btn-block">Eliminar Turno</button>
                    </form>

                    <!-- Mostrar mensajes de éxito o error -->
                    {if isset($mensaje)}
                        <div id="mensaje" class="message mt-3 alert alert-info">
                            {$mensaje}
                        </div>
                    {/if}

                    <div class="text-center mt-3">
                        <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
