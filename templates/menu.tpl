<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="icon" type="image/x-icon" href="favicon.ico">

    <style>
        /* Estilos personalizados para la barra de navegación */
        .navbar-custom {
            background-color: #004085; /* Color de fondo azul */
            background-size: cover;
        }
        
        /* Cambiar el color de los enlaces del menú a blanco */
        .nav-link, .dropdown-item {
            color: rgb(230, 223, 223) !important; /* Color blanco */
        }
        
        /* Cambiar el color de fondo del header */
        header {
            background-color: #004085; /* Fondo azul */
            padding: 10rem 0; /* Reducir padding vertical */
        }
        
        /* Estilo para el título con degradado */
        .custom-font {
            font-family: 'Arial', sans-serif; /* Aplica una fuente personalizada */
            font-weight: bolder;
            font-size: 3.5rem; /* Tamaño del texto */
            background: linear-gradient(90deg, yellow, white, lightblue); /* Degradado de colores */
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent; /* Texto transparente para mostrar el degradado */
            text-align: center; /* Centra el texto */
            margin-left: auto; /* Alinea a la derecha en el flexbox */
            margin-right: auto; /* Alinea a la izquierda en el flexbox */
        }
        
        /* Fondo de la página */
        body {
          
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 80vh;
            background-attachment: fixed;
        }
        
        /* Estilos para el pie de página */
        footer {
            background-color: #004085; /* Color de fondo azul */
            padding: 0.5rem 0; /* Reducir el padding vertical */
        }
    </style>
</head>
<body>
    <header class="text-white py-2"> 
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <img src="/logo.png" alt="Logo AUTOMOTION" class="img-fluid" style="max-width: 150px;">
                <h1 class="custom-font text-center mx-auto">AUTOMOTION</h1>
            </div>
        </div>
        <ul class="nav nav-tabs justify-content-center">
            <!-- Dropdown Clientes -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="clientesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clientes
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="clientesDropdown">
                    <a class="dropdown-item" href="/menu/crearCliente">Alta de Clientes</a>
                    <a class="dropdown-item" href="/menu/modificarCliente">Modificar Clientes</a>
                    <a class="dropdown-item" href="/menu/eliminarCliente">Eliminar Clientes</a>
                    <a class="dropdown-item" href="/menu/listarClientes">Listar Clientes</a>
                </div>
            </li>
            <!-- Dropdown Vehículos -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="vehiculosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Vehículos
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="vehiculosDropdown">
                    <a class="dropdown-item" href="/menu/crearVehiculo">Alta de Vehículos</a>
                    <a class="dropdown-item" href="/menu/modificarVehiculo">Modificar Vehículos</a>
                    <a class="dropdown-item" href="/menu/eliminarVehiculo">Eliminar Vehículos</a>
                    <a class="dropdown-item" href="/menu/listarVehiculos">Listar Vehículos</a>
                </div>
            </li>
            <!-- Dropdown Turnos -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="turnosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Turnos
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="turnosDropdown">
                    <a class="dropdown-item" href="/menu/crearTurno">Alta de Turnos</a>
                    <a class="dropdown-item" href="/menu/modificarTurno">Modificar Turnos</a>
                    <a class="dropdown-item" href="/menu/eliminarTurno">Eliminar Turnos</a>
                    <a class="dropdown-item" href="/menu/listarTurnos">Listar Turnos</a>
                </div>
            </li>
            <!-- Dropdown Servicios -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="serviciosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Servicios
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="serviciosDropdown">
                    <a class="dropdown-item" href="/menu/crearServicio">Alta de Servicios</a>
                    <a class="dropdown-item" href="/menu/modificarServicio">Modificar Servicios</a>
                    <a class="dropdown-item" href="/menu/eliminarServicio">Eliminar Servicios</a>
                    <a class="dropdown-item" href="/menu/listarServicios">Listar Servicios</a>
                    
                </div>
            </li>
             <!-- Dropdown  ServicioRealizado -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="realizadoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Servicio Realizado
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="realizadoDropdown">
                    <a class="dropdown-item" href="/menu/crearServicioRealizado">Alta de Servicios Realizados</a>
                    <a class="dropdown-item" href="/menu/modificarServicioRealizado">Modificar Servicios Realizados</a>
                    <a class="dropdown-item" href="/menu/eliminarServicioRealizado">Eliminar Servicios Realizados</a>
                    <a class="dropdown-item" href="/menu/listarServicioRealizado">Listar Servicios Realizados</a>
                </div>
            </li>
    </header>
    
    <main class="container mt-4">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body text-center">
                <h2 class="card-title">Sistema de Gestión de Vehículos</h2>
                <p class="card-text">Bienvenido Administrador</p>
            </div>
        </div>
    </main>

    <footer class="text-white text-center fixed-bottom">
        <p>&copy; 2024 Derechos Reservados AUTOMOTION</p>
    </footer>

    <!-- Scripts de JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
