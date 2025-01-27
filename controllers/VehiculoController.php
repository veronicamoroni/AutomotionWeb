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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $this->vehiculo->patente = isset($_POST['patente']) ? $_POST['patente'] : '';
            $this->vehiculo->marca = isset($_POST['marca']) ? $_POST['marca'] : '';
            $this->vehiculo->modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
            $this->vehiculo->dni_cliente = isset($_POST['dni_cliente']) ? $_POST['dni_cliente'] : '';
    
            // Verificar si la patente ya está registrada
            $query = "SELECT COUNT(*) FROM vehiculos WHERE patente = :patente";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':patente', $this->vehiculo->patente);
            $stmt->execute();
            $result = $stmt->fetchColumn();
    
            // Si la patente ya existe, detener el proceso y mostrar el mensaje
            if ($result > 0) {
                echo "La patente ingresada ya está registrada. Por favor, verifica los datos e intenta nuevamente.";
                return;
            }
    
            // Validar que los campos obligatorios no estén vacíos
            if (!empty($this->vehiculo->patente) && !empty($this->vehiculo->marca) && !empty($this->vehiculo->modelo)) {
                try {
                    // Realizar la inserción del vehículo
                    $query = "INSERT INTO vehiculos (patente, marca, modelo, dni_cliente) VALUES (:patente, :marca, :modelo, :dni_cliente)";
                    $stmt = $this->db->prepare($query);
    
                    // Enlace de parámetros
                    $stmt->bindParam(':patente', $this->vehiculo->patente);
                    $stmt->bindParam(':marca', $this->vehiculo->marca);
                    $stmt->bindParam(':modelo', $this->vehiculo->modelo);
                    $stmt->bindParam(':dni_cliente', $this->vehiculo->dni_cliente);
    
                    if ($stmt->execute()) {
                        echo "¡Vehículo creado con éxito!";
                    } else {
                        echo "Hubo un problema al crear el vehículo. Por favor, inténtalo nuevamente.";
                    }
                } catch (PDOException $e) {
                    // Capturar errores específicos de la base de datos
                    if ($e->getCode() == '23505') {
                        echo "La patente ingresada ya está registrada. Por favor, verifica los datos e intenta nuevamente.";
                    } else {
                        echo "Lo sentimos, ocurrió un error inesperado al crear el vehículo. Por favor, intenta más tarde.";
                    }
                }
            } else {
                echo "Por favor, completa todos los campos obligatorios antes de continuar.";
            }
        }
    }
    
    

    
    // Método para eliminar un vehículo
    public function eliminarVehiculo($patente) {
        $this->vehiculo->patente = $patente;
    
        // Llamar al método del modelo para eliminar el vehículo
        if ($this->vehiculo->eliminarVehiculo()) {
            // Si el vehículo fue eliminado exitosamente
            echo "Vehículo eliminado con éxito.";
        } else {
            // Si el vehículo no existe
            echo "El vehículo con la patente proporcionada No Existe.";
        }
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
    
    public function modificarVehiculo() {
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
                echo "¡Vehículo modificado con éxito!";
            } else {
                // Si el vehículo no se encuentra o no se pudo modificar
                echo "No Existe el vehículo con la patente proporcionada.";
            }
        } else {
            echo "Método de solicitud no permitido.";
        }
    }
}
?>
