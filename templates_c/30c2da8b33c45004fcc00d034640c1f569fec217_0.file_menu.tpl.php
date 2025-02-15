<?php
/* Smarty version 5.4.0, created on 2025-02-15 22:44:47
  from 'file:templates/menu.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b10acfc3bb50_30678600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30c2da8b33c45004fcc00d034640c1f569fec217' => 
    array (
      0 => 'templates/menu.tpl',
      1 => 1739655884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
))) {
function content_67b10acfc3bb50_30678600 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="/templates/styles/Menu.css">

</head>
<body>
    <header class="text-white py-2"> 
        <div class="navbar-custom d-flex justify-content-start align-items-center">
            <img src="/logo.png" alt="Logo AUTOMOTION" class="img-fluid" style="max-width: 150px;">
            <h1 class="custom-font mx-auto">AUTOMOTION</h1>
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
                   Servicios Realizados
                </a>
                <div class="dropdown-menu bg-primary" aria-labelledby="realizadoDropdown">
                    <a class="dropdown-item" href="/menu/crearServicioRealizado">Alta de Servicios Realizados</a>
                    <a class="dropdown-item" href="/menu/modificarServicioRealizado">Modificar Servicios Realizados</a>
                    <a class="dropdown-item" href="/menu/eliminarServicioRealizado">Eliminar Servicios Realizados</a>
                    <a class="dropdown-item" href="/menu/listarServicioRealizado">Listar Servicios Realizados</a>
                    <a class="dropdown-item" href="/menu/costoTotal">Costo Total</a>
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

    <?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <!-- Scripts de JavaScript -->
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
