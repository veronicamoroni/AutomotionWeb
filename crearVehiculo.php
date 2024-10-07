<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php');
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php');
require_once('C:\xampp\htdocs\AutomotionWeb\controllers\VehiculoController.php');

// Simula que es una solicitud POST
$_SERVER["REQUEST_METHOD"] = "POST";  
$_POST['patente'] = 'BBB222';          // Patente del vehículo
$_POST['marca'] = 'Toyota';            // Marca del vehículo
$_POST['modelo'] = 'Corolla';          // Modelo del vehículo
$_POST['dni_cliente'] = '2780219';    // DNI del cliente dueño del vehículo

try {
    // Crear una instancia de la conexión a la base de datos
    $database = new Model();
    $db = $database->getDb();

    // Crear instancia del controlador de Vehículos
    $vehiculoController = new VehiculoController($db);

    // Llamar al método para crear un vehículo
    $vehiculoController->crearVehiculo();
    
    echo "Vehículo creado exitosamente.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
