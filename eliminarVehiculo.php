<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php'); // Incluir el archivo de conexión
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php'); // Incluir el modelo Vehiculo
require_once('controllers/VehiculoController.php'); // Incluir el controlador VehiculoController

// Inicializar la conexión a la base de datos
$Model = new Model();
$db = $Model->getDb(); // Usar getDb() para obtener la conexión

// Inicializar el controlador Vehiculo
$vehiculoController = new VehiculoController($db);

// Verificar si se ha proporcionado una patente a través de la consola
if (isset($argv[1])) {
    $patenteAEliminar = $argv[1]; // Primer argumento pasado desde la consola

    // Llamar al método para eliminar el vehículo
    if ($vehiculoController->eliminarVehiculo($patenteAEliminar)) {
        echo "Vehículo con patente $patenteAEliminar eliminado con éxito.\n";
    } else {
        echo "Error al eliminar el vehículo con patente $patenteAEliminar.\n";
    }
} else {
    echo "Por favor, proporciona una patente como argumento.\n";
}
?>
