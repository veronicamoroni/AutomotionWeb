<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Servicio Realizado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

    {assign var="titulo" value="Gestión de Clientes"}
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
        <a class="navbar-brand" href="/">
            <img src="logo.png" alt="Logo" height="70">
        </a>
        <div class="navbar-title text-white mx-auto">Registrar Servicio Realizado</div>
    </nav>

    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Registrar Servicio Realizado</h3>
                    </div>
                    <div class="card-body">
                        <form action="/index.php?action=crearServicioRealizado" method="POST" id="formServicioRealizado">
                            
                            <!-- ID del Servicio -->
                            <div class="form-group">
                                <label for="servicios_id">ID del Servicio:</label>
                                <input type="number" class="form-control" id="servicios_id" name="servicios_id" required>
                            </div>

                            <!-- ID del Turno -->
                            <div class="form-group">
                                <label for="turnos_id">ID del Turno:</label>
                                <input type="number" class="form-control" id="turnos_id" name="turnos_id" required>
                            </div>

                            <!-- Notas -->
                            <div class="form-group">
                                <label for="notas">Notas:</label>
                                <textarea class="form-control" id="notas" name="notas" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg btn-block">Registrar Servicio Realizado</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Volver al Menú -->
        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-sm">Volver al Menú</a>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background-color: #004085;" class="text-white text-center py-3 mt-auto">
        <p>© 2025 Automotion - Todos los derechos reservados</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
