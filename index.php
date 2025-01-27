<?php

// Asegúrate de que las rutas a los archivos son correctas
require_once ('libs\Smarty.class.php');
require_once './Model/Model.php';
require_once './controllers/UserController.php';
require_once './controllers/ClienteController.php'; 
require_once './controllers/VehiculoController.php'; 
// Crear conexión a la base de datos
$database = new Model();
$db = $database->getDb();

// Instanciar el controlador de usuarios y clientes
$usuarioController = new UsuarioController($db);
$clienteController = new ClienteController($db);
$vehiculoController = new VehiculoController($db);

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
            $vehiculos= $vehiculoController->obtenerVehiculos();
            $smarty->assign('vehiculos', $vehiculos);
            $smarty->display('listarVehiculos.tpl');
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
        header("Location: /index.php?action=menu"); // Debe estar aquí
        exit(); // Asegúrate de usar exit()
        break;
    case 'modificarCliente':
        $clienteController->modificarCliente();
        break;
    case 'eliminarUsuario':
        $id = isset($_POST['id']) ? $_POST['id'] : die("Falta el ID");
        $usuarioController->eliminarUsuario($id);
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
   
}

