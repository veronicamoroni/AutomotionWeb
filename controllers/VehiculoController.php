<?php

include_once(__DIR__ . '/../Model/VehiculoModel.php');

class VehiculoController {
    private $db;
    public $vehiculo;
    private $table = "vehiculos"; // Definición de la tabla

    public function __construct($db) {
        $this->db = $db;
        $this->vehiculo = new Vehiculo($this->db);  // Instancia del modelo Vehiculo
    }

    
    public function crearVehiculo() {
        $mensaje = '';  // Variable para almacenar el mensaje
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $this->vehiculo->patente = $_POST['patente'] ?? '';
            $this->vehiculo->marca = $_POST['marca'] ?? '';
            $this->vehiculo->modelo = $_POST['modelo'] ?? '';
            $this->vehiculo->dni_cliente = $_POST['dni_cliente'] ?? '';
    
            // Validar que los campos obligatorios no estén vacíos
            if (empty($this->vehiculo->patente) || empty($this->vehiculo->marca) || empty($this->vehiculo->modelo)) {
                $mensaje = "Por favor, completa todos los campos obligatorios.";
            } else {
                // Usamos el modelo para crear el vehículo y obtener el resultado
                $mensaje = $this->vehiculo->crearVehiculo();
            }
        }
    
        // Asignamos el mensaje y mostramos el template
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/crearVehiculo.tpl');
    }
    
    
    
    public function modificarVehiculo() {
        $mensaje = '';  // Variable para almacenar el mensaje de éxito o error
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos enviados por el formulario
            $this->vehiculo->patente = $_POST['patente'] ?? '';
            $this->vehiculo->nueva_patente = $_POST['nueva_patente'] ?? $this->vehiculo->patente;
            $this->vehiculo->marca = $_POST['marca'] ?? '';
            $this->vehiculo->modelo = $_POST['modelo'] ?? '';
            $this->vehiculo->dni_cliente = $_POST['dni_cliente'] ?? '';
    
            // Validar que los campos obligatorios no estén vacíos
            if (empty($this->vehiculo->patente) || empty($this->vehiculo->marca) || empty($this->vehiculo->modelo)) {
                $mensaje = "Por favor, completa todos los campos obligatorios.";
            } else {
                // Llamar al método del modelo para modificar el vehículo
                $resultado = $this->vehiculo->modificarVehiculo();
    
                // Asignar el mensaje en función del resultado
                if ($resultado === true) {
                    $mensaje = "¡Vehículo modificado con éxito!";
                } else {
                    $mensaje = $resultado;  // Mostramos el error si no se puede modificar
                }
            }
        }
    
        // Asignar el mensaje y mostrar la plantilla
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/modificarVehiculo.tpl');
    }
    
    
    
    // Método para eliminar un vehículo
    public function eliminarVehiculo() {
        $mensaje = '';  // Variable para el mensaje de éxito o error
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener la patente del vehículo desde el formulario
            $this->vehiculo->patente = $_POST['patente'] ?? '';
        
            // Llamar al método del modelo para eliminar el vehículo
            $mensaje = $this->vehiculo->eliminarVehiculo() ? "Vehículo eliminado." : "El vehículo con la patente proporcionada no existe o no pudo ser eliminado.";
        } else {
            $mensaje = "Método de solicitud no permitido.";
        }
    
        // Asignar el mensaje a la plantilla Smarty
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/eliminarVehiculo.tpl');  // Mostrar la plantilla con el mensaje
    }
    
    

    // Método para obtener todos los vehículos
public function obtenerVehiculos() {
    $stmt = $this->vehiculo->obtenerVehiculos(); // Cambiado de $this->cliente a $this->vehiculo
    $vehiculos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los vehículos en formato asociativo

    return $vehiculos;
}

    // Método para obtener un vehículo por su patente
    public function obtenerVehiculoPorPatente($patente) {
        $this->vehiculo->patente = $patente; // Asignar la patente del vehículo
        $this->vehiculo->obtenerVehiculoPorPatente();

        $vehiculo = [
            'patente' => $this->vehiculo->patente,
            'marca' => $this->vehiculo->marca,
            'modelo' => $this->vehiculo->modelo,
            'dni_cliente' => $this->vehiculo->dni_cliente
        ];

        echo json_encode($vehiculo);
    }
    
}
?>
