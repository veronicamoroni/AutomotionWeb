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
        // Inicializar el mensaje
        $mensaje = ''; 
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Obtener datos del formulario
            $this->cliente->dni = isset($_POST['dni']) ? $_POST['dni'] : '';
            $this->cliente->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $this->cliente->apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
            $this->cliente->telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
            $this->cliente->email = isset($_POST['email']) ? $_POST['email'] : '';
    
            // Validación de los campos obligatorios
            if (empty($this->cliente->dni) || empty($this->cliente->nombre) || empty($this->cliente->apellido)) {
                $mensaje = "El DNI, nombre y apellido son obligatorios.";
            } else {
                // Usar el modelo para crear el cliente
                $resultado = $this->cliente->crearCliente();
    
                // Manejar el resultado del modelo
                if ($resultado === true) {
                    $mensaje = "Cliente creado con éxito.";
                    header("Location: /cliente/confirmacion"); // Redirigir a la página de confirmación
                    exit();
                } else {
                    $mensaje = $resultado; // Mostrar el mensaje de error o éxito
                }
            }
        }
    
        // Asignar el mensaje al template para mostrarlo
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/crearCliente.tpl');
    }
    
    
    // Método para actualizar un cliente
    public function modificarCliente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos enviados por el formulario
            $this->cliente->dni = isset($_POST['dni']) ? $_POST['dni'] : '';
            $this->cliente->telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
            $this->cliente->email = isset($_POST['email']) ? $_POST['email'] : '';

            // Validar que los datos esenciales estén presentes
            if (!empty($this->cliente->dni)) {
                // Llamar al método del modelo para modificar el cliente
                $resultado = $this->cliente->modificarCliente();

                // Verificar el resultado
                if ($resultado === true) {
                    // Si la actualización es exitosa
                    $mensaje = "Cliente actualizado.";
                } else {
                    // Si no se pudo modificar (por ejemplo, cliente no encontrado)
                    $mensaje = $resultado;
                }
            } else {
                // Si el DNI está vacío
                $mensaje = "Falta el DNI del cliente.";
            }

            // Asignar el mensaje a la vista
            $smarty = new Smarty\Smarty;
            $smarty->assign('mensaje', $mensaje);
            $smarty->display('templates/modificarCliente.tpl');
        }
    }


    // Método para eliminar un cliente
    public function eliminarCliente($dni) {
        $this->cliente->dni = $dni;
    
        // Intentamos eliminar al cliente
        $mensaje = $this->cliente->eliminarCliente();
        
        // Verificamos si el mensaje es un error o éxito
        if ($mensaje === true) {
            $mensaje = "Cliente eliminado con éxito."; // Mensaje de éxito
        }
        
        // Asignamos el mensaje a la plantilla
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/eliminarCliente.tpl');
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