<?php
/* Smarty version 5.4.0, created on 2024-10-03 01:29:11
  from 'file:templates/menu.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66fdd74770cd21_45368601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30c2da8b33c45004fcc00d034640c1f569fec217' => 
    array (
      0 => 'templates/menu.tpl',
      1 => 1727911742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66fdd74770cd21_45368601 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\Usuario\\Desktop\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
            padding: 0.1rem 0; /* Reducir padding vertical */
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
            background-image: url('imagen.jpg'); /* Cambia la ruta según la ubicación de tu imagen */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
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
                 <aside>
        <   p>alta</p>
        <button onclick="window.location.href='/crearCliente'">alta</button>
    </aside>
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
                    <a class="dropdown-item" href="#altaVehiculos">Alta de Vehículos</a>
                    <a class="dropdown-item" href="#modificarVehiculos">Modificar Vehículos</a>
                    <a class="dropdown-item" href="#eliminarVehiculos">Eliminar Vehículos</a>
                    <a class="dropdown-item" href="#listarVehiculos">Listar Vehículos</a>
                </div>
            </li>
            <!-- Dropdown Turnos -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="turnosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Turnos
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="turnosDropdown">
                    <a class="dropdown-item" href="#altaTurnos">Alta de Turnos</a>
                    <a class="dropdown-item" href="#modificarTurnos">Modificar Turnos</a>
                    <a class="dropdown-item" href="#eliminarTurnos">Eliminar Turnos</a>
                    <a class="dropdown-item" href="#listarTurnos">Listar Turnos</a>
                </div>
            </li>
            <!-- Facturación (no dropdown) -->
            <li class="nav-item">
                <a class="nav-link" href="#tab-facturacion">Facturación</a>
            </li>
        </ul>
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

    <!-- Usar la versión completa de jQuery en lugar de Slim -->
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
