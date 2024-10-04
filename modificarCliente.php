<?php
// Incluir los archivos necesarios
require_once('C:\xampp\htdocs\AutomotionWeb\configs\conexion.php');
require_once('C:\xampp\htdocs\AutomotionWeb\Model\Model.php');
require_once('C:\xampp\htdocs\AutomotionWeb\controllers\ClienteController.php');


try {
    // Simula que es una solicitud POST
    $_SERVER["REQUEST_METHOD"] = "POST";  
    $_POST['dni'] = '12345678';           // DNI del cliente a modificar
    $_POST['telefono'] = '5559876543';    // Nuevo teléfono
    $_POST['email'] = 'juan.perez@nuevo.com'; // Nuevo email

    // Crear una instancia de la conexión a la base de datos
    $database = new Model();
    $db = $database->getDb(); // Obtener la conexión

    // Crear instancia del controlador de Clientes
    $clienteController = new ClienteController($db);

    // Asignar los valores a las propiedades de la clase
    $clienteController->telefono = $_POST['telefono'];
    $clienteController->email = $_POST['email'];
    $clienteController->dni = $_POST['dni']; // Asignar el DNI

    // Llamar al método para modificar el cliente
    if ($clienteController->modificarCliente()) {
        echo "Cliente modificado con éxito.";
    } else {
        echo "Error al modificar el cliente.";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
