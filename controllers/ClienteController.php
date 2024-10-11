<?php
require_once('C:\xampp\htdocs\AutomotionWeb\Model\ClienteModel.php');



class ClienteController {
    private $db;
    private $cliente;

    public function __construct($db) {
        $this->db = $db;
        $this->cliente = new Cliente($db);
    }

    public function crearCliente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $this->cliente->dni = isset($_POST['dni']) ? $_POST['dni'] : '';
            $this->cliente->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $this->cliente->apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
            $this->cliente->telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
            $this->cliente->email = isset($_POST['email']) ? $_POST['email'] : '';
    
            // Validar que los campos obligatorios no estén vacíos
            if (!empty($this->cliente->dni) && !empty($this->cliente->nombre) && !empty($this->cliente->apellido)) {
                // Llamar al método para crear el cliente
                $resultado = $this->cliente->crearCliente();
    
                // Verificar el resultado
                if ($resultado === true) {
                    echo "Cliente creado con éxito.";
                } else {
                    echo $resultado;  // Mostrar mensaje de error si el cliente ya existe o hubo otro problema
                }
            } else {
                echo "Por favor, rellena todos los campos obligatorios.";
            }
        }
    }
    

  
   
    public function obtenerClientePorDni() {
        $query = "SELECT * FROM " . $this->table . " WHERE dni = :dni LIMIT 1"; // Cambia aquí
    
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            // Asigna los valores a las propiedades del cliente
            $this->nombre = $row['nombre'];
            $this->apellido = $row['apellido'];
            $this->telefono = $row['telefono'];
            $this->email = $row['email'];
        }
    }
    
    // Método para actualizar un cliente
    public function modificarCliente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['dni']) && !empty($_POST['dni'])) {
                $this->cliente->dni = $_POST['dni'];
                $this->cliente->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
                $this->cliente->apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
                $this->cliente->telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
                $this->cliente->email = isset($_POST['email']) ? $_POST['email'] : '';

                if ($this->cliente->modificarCliente()) {
                    echo "Cliente actualizado con éxito.";
                } else {
                    echo "Error al actualizar el cliente.";
                }
            } else {
                echo "Falta el DNI del cliente.";
            }
        }
    }

    // Método para eliminar un cliente
    public function eliminarCliente($dni) {
        $this->cliente->dni = $dni;

        if ($this->cliente->eliminarCliente($dni)) {
            echo "Cliente eliminado con éxito.";
        } else {
            echo "Error al eliminar el cliente.";
        }
    }
    
 
}
?>
