<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php');
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php');
require_once('C:\xampp\htdocs\AutomotionWeb\controllers\VehiculoController.php');

try {
    // Simula que es una solicitud POST
    $_SERVER["REQUEST_METHOD"] = "POST";  
    $_POST['patente'] = 'ABC123';          // Patente del vehículo a modificar
    $_POST['marca'] = 'Toyota';             // Nueva marca
    $_POST['modelo'] = 'Corolla';           // Nuevo modelo
    $_POST['dni_cliente'] = '12345678';     // DNI del cliente asociado al vehículo

    // Crear una instancia de la conexión a la base de datos
    $database = new Model();
    $db = $database->getDb(); // Obtener la conexión

    // Crear instancia del controlador de Vehículos
    $vehiculoController = new VehiculoController($db);

    // Crear una instancia del Vehiculo y establecer sus propiedades
    $vehiculo = new Vehiculo(); // Asumiendo que tienes una clase Vehiculo
    $vehiculo->setPatente($_POST['patente']);  // Asignar la patente
    $vehiculo->setMarca($_POST['marca']);      // Asignar la nueva marca
    $vehiculo->setModelo($_POST['modelo']);    // Asignar el nuevo modelo
    $vehiculo->setDniCliente($_POST['dni_cliente']); // Asignar el DNI del cliente

    // Establecer el vehículo en el controlador
    $vehiculoController->setVehiculo($vehiculo);

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
