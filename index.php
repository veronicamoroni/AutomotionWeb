<?php

// Asegúrate de que las rutas a los archivos son correctas
require_once 'C:\xampp\htdocs\AutomotionWeb\libs\Smarty.class.php';
include_once  './Model/Model.php'; // Asegúrate de que este archivo existe y contiene la clase Database
include_once './controllers/UserController.php'; // Asegúrate de que este archivo existe y contiene la clase UsuarioControlador

// Inicializa Smarty
$smarty = new Smarty\Smarty;

$smarty->setTemplateDir('C:\xampp\htdocs\AutomotionWeb\templates');
$smarty->setCompileDir('C:\xampp\htdocs\AutomotionWeb\templates_c');
$smarty->setCacheDir('C:\xampp\htdocs\AutomotionWeb\cache');
$smarty->setConfigDir('C:\xampp\htdocs\AutomotionWeb\configs');

// Muestra la plantilla
$smarty->display('Registrarse.tpl');

// Crear conexión a la base de datos
$database = new Model();
$db = $database->getDb();

// Instanciar el controlador de usuarios
$usuarioController = new UsuarioController($db);

// Gestionar las rutas simples
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'registrarse':
        $usuarioController->registrarse();
        break;
    case 'iniciarSesion':
        $usuarioController->iniciarSesion();
            break;
    case 'obtenerUsuarios':
        $usuarioController->obtenerUsuarios();
        break;
    case 'eliminarUsuario':
        $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID");
        $usuarioController->eliminarUsuario($id);
        break;
    case 'actualizarUsuario':
        $usuarioController->actualizarUsuario();
        break;
    default:
       // echo "Acción no reconocida.";
}

?>