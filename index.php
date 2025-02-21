<?php
require_once('libs/Smarty.class.php');
require_once('./Model/Model.php');
require_once('./controllers/ClienteController.php'); 
require_once('./controllers/VehiculoController.php'); 
require_once('./controllers/TurnoController.php');
require_once('./controllers/ServicioController.php'); // Incluir el controlador de Servicios
require_once('./controllers/ServicioRealizadoController.php'); // Corregir la ruta


// Crear conexión a la base de datos
$database = new Model();
$db = $database->getDb();

// Instanciar los controladores

$clienteController = new ClienteController($db);
$vehiculoController = new VehiculoController($db);
$turnoController = new TurnoController($db);
$servicioController = new ServicioController($db); // Instancia el controlador de Servicios
$serviciorealizadoController = new ServicioRealizadoController($db);

// Inicializa Smarty
$smarty = new Smarty\Smarty;
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Obtener la URL solicitada
$request = $_SERVER['REQUEST_URI'];


require_once('routes/routes.php');
require_once('routes/actions.php');


?>
