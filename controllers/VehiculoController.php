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
        $mensaje = '';
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $this->vehiculo->patente = $_POST['patente'] ?? '';
            $this->vehiculo->marca = $_POST['marca'] ?? '';
            $this->vehiculo->modelo = $_POST['modelo'] ?? '';
            $this->vehiculo->dni_cliente = $_POST['dni_cliente'] ?? '';
    
            // Validar que los campos obligatorios no estén vacíos
            if (empty($this->vehiculo->patente) || empty($this->vehiculo->marca) || empty($this->vehiculo->modelo)) {
                $mensaje = "Por favor, completa todos los campos obligatorios.";
            } else {
                // Verificar si la patente ya está registrada
                $query = "SELECT COUNT(*) FROM vehiculos WHERE patente = :patente";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':patente', $this->vehiculo->patente);
                $stmt->execute();
    
                if ($stmt->fetchColumn() > 0) {
                    $mensaje = "La patente ingresada ya está registrada.";
                } else {
                    // Insertar el vehículo
                    $query = "INSERT INTO vehiculos (patente, marca, modelo, dni_cliente) VALUES (:patente, :marca, :modelo, :dni_cliente)";
                    $stmt = $this->db->prepare($query);
                    $stmt->bindParam(':patente', $this->vehiculo->patente);
                    $stmt->bindParam(':marca', $this->vehiculo->marca);
                    $stmt->bindParam(':modelo', $this->vehiculo->modelo);
                    $stmt->bindParam(':dni_cliente', $this->vehiculo->dni_cliente);
    
                    // Establecer el mensaje dependiendo del éxito o error de la inserción
                    $mensaje = $stmt->execute() ? "¡Vehículo creado con éxito!" : "Hubo un problema al crear el vehículo.";
                }
            }
        }
    
        // Asignar el mensaje y mostrar el template
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/crearVehiculo.tpl');
    }
    
    
    public function modificarVehiculo() {
        $mensaje = '';  // Variable para almacenar el mensaje de éxito o error
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos enviados por el formulario
            $this->vehiculo->patente = isset($_POST['patente']) ? $_POST['patente'] : '';
            $this->vehiculo->nueva_patente = isset($_POST['nueva_patente']) ? $_POST['nueva_patente'] : $this->vehiculo->patente;
            $this->vehiculo->marca = isset($_POST['marca']) ? $_POST['marca'] : '';
            $this->vehiculo->modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
            $this->vehiculo->dni_cliente = isset($_POST['dni_cliente']) ? $_POST['dni_cliente'] : '';
    
            // Llamar al método del modelo para modificar el vehículo
            if ($this->vehiculo->modificarVehiculo()) {
                // Si la actualización es exitosa
                $mensaje = "¡Vehículo modificado con éxito!";
            } else {
                // Si el vehículo no se encuentra o no se pudo modificar
                $mensaje = "No existe el vehículo con la patente proporcionada.";
            }
        } else {
            $mensaje = "Método de solicitud no permitido.";
        }
    
        // Asignar el mensaje a la plantilla Smarty
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/modificarVehiculo.tpl');  // Mostrar la plantilla
    }
    
    
    // Método para eliminar un vehículo
    public function eliminarVehiculo() {
        $mensaje = '';  // Variable para el mensaje de éxito o error
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener la patente del vehículo desde el formulario
            $this->vehiculo->patente = isset($_POST['patente']) ? $_POST['patente'] : '';
    
            // Llamar al método del modelo para eliminar el vehículo
            if ($this->vehiculo->eliminarVehiculo()) {
                // Si la eliminación es exitosa
                $mensaje = "¡Vehículo eliminado con éxito!";
            } else {
                // Si el vehículo no se encuentra o no se pudo eliminar
                $mensaje = "El vehículo con la patente proporcionada no existe o no pudo ser eliminado.";
            }
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
