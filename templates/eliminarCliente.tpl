<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Navbar -->
    {assign var="titulo" value="Gestión de Clientes"}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
        <a class="navbar-brand" href="#">
            <img src="/logo.png" alt="Logo" style="height: 70px;">
        </a>
        <div class="navbar-title mx-auto text-center text-white">
            {$titulo}
        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="container flex-fill mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <div class="card-header text-center">
                        <span class="material-symbols-outlined" style="font-size: 50px; color: #dc3545;">delete_forever</span>
                        <h3 class="mt-2">Eliminar Cliente</h3>
                    </div>
                    <div class="card-body">
                        <form action="/index.php?action=eliminarCliente" method="post" onsubmit="return confirmarEliminacion();">
                            <div class="form-group">
                                <label for="dni">DNI del cliente a Eliminar:</label>
                                <input type="text" class="form-control" id="dni" name="dni" required>
                            </div>
                            <button type="submit" class="btn btn-danger btn-lg btn-block mt-3">Eliminar Usuario</button>
                        </form>

                        <!-- Mensaje de respuesta -->
                        {if isset($mensaje)}
                            <div id="mensaje" class="message mt-3 alert alert-info text-center">
                                {$mensaje}
                            </div>
                        {/if}

                    </div>
                </div>
            </div>
        </div>

        <!-- Volver al Menú -->
        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-sm">Volver al Menú</a>
        </div>
    </div>

   

    <!-- JavaScript para confirmación de eliminación -->
    <script>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este cliente?");
        }
    </script>
    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-auto" style="background-color: #004085;">
        <p>© 2025 Automotion - Todos los derechos reservados</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
