<?php
// Incluye el archivo principal de Smarty. Ajusta la ruta según sea necesario.
require_once('C:\xampp\htdocs\app1\libs\Smarty.class.php');


$smarty = new Smarty\Smarty;

// Configura los directorios de Smarty. Usa __DIR__ para obtener la ruta absoluta
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
$smarty->setCacheDir(__DIR__ . '/cache');
$smarty->setConfigDir(__DIR__ . '/configs');

// Prueba la instalación de Smarty para asegurarte de que todo esté configurado correctamente
$smarty->testInstall();

// Muestra la plantilla
$smarty->display('templates.tpl');

?>