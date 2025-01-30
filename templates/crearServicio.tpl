<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Servicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Puedes agregar aquí tus estilos personalizados */
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Alta de Servicio</h3>
                    </div>
                    <div class="card-body">
                        <!-- Formulario de creación de servicio -->
                        <form action="/index.php?action=crearServicio" method="POST" id="formCrearServicio">
                            <!-- Descripción del servicio -->
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>

                            <!-- Costo del servicio -->
                            <div class="form-group">
                                <label for="costo">Costo:</label>
                                <input type="number" class="form-control" id="costo" name="costo" required>
                            </div>

                            <!-- Botón para enviar el formulario -->
                            <button type="submit" class="btn btn-primary btn-block">Registrar Servicio</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary">Volver al Menú</a>
        </div>
    </div>

    <!-- Scripts necesarios para Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
