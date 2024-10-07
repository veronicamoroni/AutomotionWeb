<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php');
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php');
require_once('C:\xampp\htdocs\AutomotionWeb\controllers\VehiculoController.php');

try {
    // Simula que es una solicitud POST
    $_SERVER["REQUEST_METHOD"] = "POST";  
    $_POST['patente'] = 'BBB222';          // Patente del vehículo a modificar
    $_POST['marca'] = 'FIAT';             // Nueva marca
    $_POST['modelo'] = 'FIAT';           // Nuevo modelo
    $_POST['dni_cliente'] = '2780219';     // DNI del cliente asociado al vehículo

    // Crear una instancia de la conexión a la base de datos
    $database = new Model();
    $db = $database->getDb(); // Obtener la conexión

    // Crear instancia del controlador de Vehículos
    $vehiculoController = new VehiculoController($db);

    // Asignar los valores a las propiedades del vehículo
    $vehiculoController->vehiculo->patente = $_POST['patente'];
    $vehiculoController->vehiculo->marca = $_POST['marca'];
    $vehiculoController->vehiculo->modelo = $_POST['modelo'];
    $vehiculoController->vehiculo->dni_cliente = $_POST['dni_cliente'];
    
    // Llamar al método para modificar el vehículo
    if ($vehiculoController->modificarVehiculo()) {
        echo "Vehículo modificado con éxito.";
    } else {
        echo "Error al modificar el vehículo.";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
