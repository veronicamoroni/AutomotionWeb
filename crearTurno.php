<?php
// Incluir los archivos necesarios
require_once './configs/conexion.php';
require_once './Model/Model.php';
require_once './controllers/TurnoController.php';

// Simula que es una solicitud POST
$_SERVER["REQUEST_METHOD"] = "POST";  
$_POST['fecha'] = '2025-01-30';           // Fecha del turno
$_POST['hora'] = '10:30:00';             // Hora del turno
$_POST['descripcion'] = 'Cambio de aceite'; // Descripción del turno
$_POST['patente'] = 'BBB222';            // Patente del vehículo

try {
    // Crear una instancia de la conexión a la base de datos
    $database = new Model();
    $db = $database->getDb();

    // Crear instancia del controlador de Turnos
    $turnoController = new TurnoController($db);

    // Llamar al método para crear un turno
    $turnoController->crearTurno();
    
    echo "Turno creado exitosamente.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>