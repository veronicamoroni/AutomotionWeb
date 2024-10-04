<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php'); // Incluir el archivo de conexión
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php'); // Incluir el modelo Cliente
require_once('controllers/ClienteController.php'); // Incluir el controlador ClienteController

// Inicializar la conexión a la base de datos
$Model = new Model();
$db = $Model->getDb(); // Usar getDb() para obtener la conexión

// Inicializar el controlador Cliente
$clienteController = new ClienteController($db);

// Verificar si se ha proporcionado un DNI a través de la consola
if (isset($argv[1])) {
    $dniAEliminar = $argv[1]; // Primer argumento pasado desde la consola

    // Llamar al método para eliminar e1 cliente
    $clienteController->eliminarCliente($dniAEliminar);
} else {
    echo "Por favor, proporciona un DNI como argumento.\n";
}
?>
