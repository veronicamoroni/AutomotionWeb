<?php

require_once ('C:\xampp\htdocs\automotionweb\frontend\libs\Smarty.class.php');
require_once ('C:\xampp\htdocs\automotionweb\configs\conexion.php');     // Configuración de base de datos

// Crea una instancia de Smarty

$smarty = new Smarty\Smarty;

// Se Configura los directorios de Smarty. 
$smarty->setTemplateDir('C:\xampp\htdocs\automotionweb\frontend\templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');
// Obtener la acción desde la URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Mostrar la plantilla correspondiente según la acción
if ($action == 'register') {
    // Cargar la plantilla del formulario de registro
    $smarty->display('registro.tpl');
} else {
    // Cargar la plantilla del índice por defecto (inicio de sesión)
    $smarty->display('index.tpl');
}
?>