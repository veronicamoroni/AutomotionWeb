<?php
require_once('C:\xampp\htdocs\AutomotionWeb\Model\VehiculoModel.php');

class VehiculoController {
    private $db;
    private $vehiculo;

    public function __construct($db) {
        $this->db = $db;
        $this->vehiculo = new Vehiculo($db);  // Instancia del modelo Vehiculo
    }

    public function crearVehiculo() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $this->vehiculo->patente = isset($_POST['patente']) ? $_POST['patente'] : '';
            $this->vehiculo->marca = isset($_POST['marca']) ? $_POST['marca'] : '';
            $this->vehiculo->modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
            $this->vehiculo->dni_cliente = isset($_POST['dni_cliente']) ? $_POST['dni_cliente'] : '';

            // Validar que los campos obligatorios no estén vacíos
            if (!empty($this->vehiculo->patente) && !empty($this->vehiculo->marca) && !empty($this->vehiculo->modelo)) {
                // Llamar al método para crear el vehículo
                $resultado = $this->vehiculo->crearVehiculo();

                // Verificar el resultado
                if ($resultado === true) {
                    echo "Vehículo creado con éxito.";
                } else {
                    echo $resultado;  // Mostrar mensaje de error si el vehículo ya existe o hubo otro problema
                }
            } else {
                echo "Por favor, rellena todos los campos obligatorios.";
            }
        }
    }
}
?>
