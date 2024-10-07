<?php

// Asegúrate de que las rutas a los archivos son correctas
require_once 'C:\xampp\htdocs\AutomotionWeb\libs\Smarty.class.php';
include_once './Model/Model.php'; // Asegúrate de que este archivo existe y contiene la clase Database
include_once './controllers/UserController.php'; // Asegúrate de que este archivo existe y contiene la clase UsuarioController
include_once './controllers/ClienteController.php'; 

// Inicializa Smarty
$smarty = new Smarty\Smarty;

$smarty->setTemplateDir('C:\xampp\htdocs\AutomotionWeb\templates');
$smarty->setCompileDir('C:\xampp\htdocs\AutomotionWeb\templates_c');
$smarty->setCacheDir('C:\xampp\htdocs\AutomotionWeb\cache');
$smarty->setConfigDir('C:\xampp\htdocs\AutomotionWeb\configs');



/*Mostrar la plantilla del menú primero
$request= $_SERVER['REQUEST_URI'];
switch ($request) {
    case 'registrarse':
     $smarty->display('templates/Registrarse.tpl');
    case '/menu':
        $smarty->display('templates/menu.tpl');
        break;
    case 'crearCliente':
        $smarty->display('templates/crearCliente.tpl');
        break;
    case '/menu/modificarCliente':
        $smarty->display('templates/modificarCliente.tpl');
        break;
    case '/menu/eliminarCliente':
        $smarty->display('templates/eliminarCliente.tpl');
            break;            
    case '/menu/listarClientes':
        $smarty->display('templates/listarClientes.tpl');
        break;       */
    // Crear conexión a la base de datos
    $smarty->display('Registrarse.tpl');
    $smarty->display('crearCliente.tpl');
    $smarty->display('modificarCliente.tpl');
    $smarty->display('eliminarCliente.tpl');
    $smarty->display('listarClientes.tpl');

$database = new Model();
$db = $database->getDb();

// Instanciar el controlador de usuarios y clientes
$usuarioController = new UsuarioController($db);
$clienteController = new ClienteController($db);

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
            case 'eliminarCliente':
                $dni = isset($_POST['dni']) ? $_POST['dni'] : die("Falta el DNI");
                $clienteController->eliminarCliente($dni);
                break;
            
    case 'obtenerClientePorDni':
            $clienteController->obtenerClientePorDni();
            
    default:
       // echo "Acción no reconocida.";
}
   
           
        

