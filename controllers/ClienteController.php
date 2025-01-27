<?php
require_once(__DIR__ . '/../Model/ClienteModel.php');

class ClienteController {
    private $db;
    private $cliente;

    public function __construct($db) {
        $this->db = $db;
        $this->cliente = new Cliente($db);
    }

    public function crearCliente() {
        $mensaje = ''; // Inicializar el mensaje para mostrar en la página
    
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
                    // Mostrar mensaje de éxito
                    $mensaje = "Cliente creado con éxito.";
    
                    echo "<script>document.getElementById('formCrearCliente').reset();</script>";
    
                } else {
                    // Mostrar mensaje de error si el cliente ya existe o hubo otro problema
                    $mensaje = $resultado;
                }
            } else {
                // Mostrar mensaje si faltan campos obligatorios
                $mensaje = "Por favor, rellena todos los campos obligatorios.";
            }
        }
    
        echo "<div id='mensaje'>$mensaje</div>";
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
    
    public function obtenerClientes() {
        // Llamar al método del modelo para obtener los datos de los clientes
        $stmt = $this->cliente->obtenerClientes();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    }
    // Método para obtener un cliente por DNI
    public function obtenerClientePorDni($dni) {
    // Asignar el DNI al objeto cliente
    $this->cliente->dni = $dni;

    // Llamar al método del modelo para obtener el cliente
    $this->cliente->obtenerClientePorDni();

    // Verificar si se encontró el cliente
    if (!empty($this->cliente->nombre)) {
        // Crear un arreglo con los datos del cliente
        $cliente = [
            "dni" => $this->cliente->dni,
            "nombre" => $this->cliente->nombre,
            "apellido" => $this->cliente->apellido,
            "telefono" => $this->cliente->telefono,
            "email" => $this->cliente->email
        ];
        // Retornar el cliente en formato JSON
        echo json_encode($cliente);
    } else {
        // Retornar un mensaje indicando que no se encontró el cliente
        echo json_encode(["message" => "Cliente no encontrado."]);
    }
}

    }
   
?>
