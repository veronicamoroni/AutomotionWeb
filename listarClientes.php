<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php'); // Archivo de conexión
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php'); // Modelo Cliente
require_once('controllers/ClienteController.php'); // Controlador ClienteController

// Inicializar la conexión a la base de datos
$Model = new Model();
$db = $Model->getDb(); // Usar getDb() para obtener la conexión

// Inicializar el controlador Cliente
$clienteController = new ClienteController($db);

// Llamar al método para listar los clientes
$clientes = $clienteController->obtenerClientePorDni();

// Verificar si hay clientes y mostrar los resultados
if (!empty($clientes)) {
    foreach ($clientes as $cliente) {
        echo "DNI: " . $cliente['dni'] . "\n";
        echo "Nombre: " . $cliente['nombre'] . "\n";
        echo "Apellido: " . $cliente['apellido'] . "\n";
        echo "Teléfono: " . $cliente['telefono'] . "\n";
        echo "Email: " . $cliente['email'] . "\n";
        echo "-------------------------\n";
    }
} else {
    echo "No hay clientes en la base de datos.\n";
}
?>
