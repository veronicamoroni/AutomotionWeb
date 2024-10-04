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
    

    // Método para obtener todos los clientes
    public function listarClientes() {
        $stmt = $this->cliente->listarClientes();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Cambia el `echo json_encode($clientes);`
        
    }
   
    // Método para obtener un cliente por su ID
    public function obtenerClientePorId($id) {
        $this->cliente->dni = $id; // Assuming 'dni' is used as an identifier
        $this->cliente->obtenerClientePorDni();

        $cliente = [
            'dni' => $this->cliente->dni,
            'nombre' => $this->cliente->nombre,
            'apellido' => $this->cliente->apellido,
            'telefono' => $this->cliente->telefono,
            'email' => $this->cliente->email
        ];

        echo json_encode($cliente);
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

        if ($this->cliente->eliminarCliente()) {
            echo "Cliente eliminado con éxito.";
        } else {
            echo "Error al eliminar el cliente.";
        }
    }
    // Método para obtener todos los vehículos
public function listarVehiculos() {
    $stmt = $this->vehiculo->listarVehiculos(); // Asegúrate de que este método esté implementado en tu modelo de vehículo
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los vehículos como un array asociativo
}

}
?>
