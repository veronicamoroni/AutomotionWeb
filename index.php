<?php

// Asegúrate de que las rutas a los archivos son correctas
require_once ('libs\Smarty.class.php');
require_once './Model/Model.php';
require_once './controllers/UserController.php';
require_once './controllers/ClienteController.php'; 
require_once './controllers/VehiculoController.php'; 
require_once './controllers/TurnoController.php';
require_once './controllers\ServicioController.php'; // Incluir el controlador de Servicios

// Crear conexión a la base de datos
$database = new Model();
$db = $database->getDb();

// Instanciar los controladores
$usuarioController = new UsuarioController($db);
$clienteController = new ClienteController($db);
$vehiculoController = new VehiculoController($db);
$turnoController = new TurnoController($db);
$servicioController = new ServicioController($db); // Instancia el controlador de Servicios

// Inicializa Smarty
$smarty = new Smarty\Smarty;
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Obtener la URL solicitada
$request = $_SERVER['REQUEST_URI'];

// Manejo de rutas
switch ($request) {
    case '/registrarse':
        $smarty->display('templates/Registrarse.tpl');
        break;
    case '/menu':
        $smarty->display('templates/menu.tpl');
        break;
    case '/menu/crearCliente':
        $smarty->display('templates/crearCliente.tpl');
        break;
    case '/menu/modificarCliente':
        $smarty->display('templates/modificarCliente.tpl');
        break;
    case '/menu/eliminarCliente':
        $smarty->display('templates/eliminarCliente.tpl');
        break;            
    case '/menu/listarClientes':
        // Obtener y mostrar la lista de clientes
        $clientes = $clienteController->obtenerClientes();
        $smarty->assign('clientes', $clientes);
        $smarty->display('listarClientes.tpl');
        break;
    case '/menu/crearVehiculo':
        $smarty->display('templates/crearVehiculo.tpl');
        break;
    case '/menu/modificarVehiculo':
        $smarty->display('templates/modificarVehiculo.tpl');
        break;
    case '/menu/eliminarVehiculo':
        $smarty->display('templates/eliminarVehiculo.tpl');
    case '/menu/listarVehiculos':
            $vehiculos = $vehiculoController->obtenerVehiculos();
            $smarty->assign('vehiculos', $vehiculos);
            $smarty->display('listarVehiculos.tpl');
            break;    
    case '/menu/crearTurno':
        $smarty->display('templates/crearTurno.tpl');
        break;
    case '/menu/modificarTurno':
        $smarty->display('templates/modificarTurno.tpl');
        break;
    case '/menu/eliminarTurno':
        $smarty->display('templates/eliminarTurno.tpl');
        break;

    // Rutas para gestionar Servicios
    case '/menu/crearServicio':
        $smarty->display('templates/crearServicio.tpl'); // Mostrar formulario de creación de servicio
        break;
    case '/menu/modificarServicio':
        $smarty->display('templates/modificarServicio.tpl'); // Mostrar formulario para modificar servicio
        break;
    case '/menu/eliminarServicio':
        $smarty->display('templates/eliminarServicio.tpl'); // Mostrar formulario para eliminar servicio
        break;
    case '/menu/listarServicios':
        // Obtener y mostrar la lista de servicios
        $servicios = $servicioController->obtenerServicios();
        $smarty->assign('servicios', $servicios);
        $smarty->display('listarServicios.tpl'); // Mostrar la lista de servicios
        break;
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'registrarse':
        $usuarioController->registrarse();
        break;
    case 'crearCliente':
        $clienteController->crearCliente();
        break;
    case 'modificarCliente':
        $clienteController->modificarCliente();
        break;
    case 'eliminarCliente':
        $dni = isset($_POST['dni']) ? $_POST['dni'] : die("Falta el DNI");
        $clienteController->eliminarCliente($dni);
        break;
    case 'crearVehiculo':
        $vehiculoController->crearVehiculo();
        break;    
    case 'modificarVehiculo':
        $vehiculoController->modificarVehiculo();
        break;    
    case 'eliminarVehiculo':
        $patente = isset($_POST['patente']) ? $_POST['patente'] : die("Falta la patente");
        $vehiculoController->eliminarVehiculo($patente);
        break;
    case 'crearTurno':
        $turnoController->crearTurno();
        break;  
    case 'modificarTurno':
        $turnoController->modificarTurno();
        break;
    case 'eliminarTurno':
        $id = isset($_POST['id']) ? $_POST['id'] : die("Falta id");
        $turnoController->eliminarTurno();
        break;

    // Acciones para Servicios
    case 'crearServicio':
        $servicioController->crearServicio(); // Llamar al método para crear un servicio
        break;
    case 'modificarServicio':
        $servicioController->modificarServicio(); // Llamar al método para modificar un servicio
        break;
    case 'eliminarServicio':
        $id = isset($_POST['id']) ? $_POST['id'] : die("Falta id");
        $servicioController->eliminarServicio($id); // Llamar al método para eliminar un servicio
        break;
}
?>
