<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php'); // Archivo de conexión
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php'); // Modelo Vehículo
require_once('controllers/VehiculoController.php'); // Controlador VehiculoController

// Inicializar la conexión a la base de datos
$Model = new Model();
$db = $Model->getDb(); // Usar getDb() para obtener la conexión

// Inicializar el controlador Vehículo
$vehiculoController = new VehiculoController($db);

// Llamar al método para listar los vehículos
$vehiculos = $vehiculoController->listarVehiculos();

// Verificar si hay vehículos y mostrar los resultados
if (!empty($vehiculos)) {
    foreach ($vehiculos as $vehiculo) {
        echo "Patente: " . $vehiculo['patente'] . "\n";
        echo "Marca: " . $vehiculo['marca'] . "\n";
        echo "Modelo: " . $vehiculo['modelo'] . "\n";
        echo "DNI del Cliente: " . $vehiculo['dni_cliente'] . "\n"; // Suponiendo que tienes esta relación
        echo "-------------------------\n";
    }
} else {
    echo "No hay vehículos en la base de datos.\n";
}
?>
