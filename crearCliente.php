<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php');
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php');
require_once('C:\xampp\htdocs\AutomotionWeb\controllers\ClienteController.php');

// Simula que es una solicitud POST
$_SERVER["REQUEST_METHOD"] = "POST";  
$_POST['dni'] = '22400422';           // DNI del cliente
$_POST['nombre'] = 'Jose';            // Nombre del cliente
$_POST['apellido'] = 'Puan';         // Apellido del cliente
$_POST['telefono'] = '555';    // Teléfono del cliente
$_POST['email'] = 'jose@gmail.com'; // Email del cliente

try {
    // Crear una instancia de la conexión a la base de datos
    $database = new Model();
    $db = $database->getDb();

    // Crear instancia del controlador de Clientes
    $clienteController = new ClienteController($db);

    // Llamar al método para crear un cliente
    $clienteController->crearCliente();
    
    echo "Cliente creado exitosamente.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
