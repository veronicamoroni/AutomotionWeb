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
    
                    // Aquí puedes resetear el formulario usando JavaScript desde el frontend
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
    
        // Mostrar el mensaje en la vista (asegúrate de tener una parte del HTML que muestre esto)
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
    
    // Método para obtener todos los clientes
    public function obtenerClientes() {
        $stmt = $this->cliente->obtenerClientes(); // Cambiado de $this->usuario a $this->cliente
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($clientes);
}

    }
   
?>
