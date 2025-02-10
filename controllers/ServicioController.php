<?php
require_once './Model/ServicioModel.php';

class ServicioController {
    private $db;
    private $servicio;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
        $this->servicio = new Servicio($this->db);
    }

    // Crear un nuevo servicio
    public function crearServicio() {
        // Validación de los datos del formulario
        if (empty($_POST['descripcion']) || empty($_POST['costo'])) {
            $mensaje = "La descripción y el costo son obligatorios.";
        } elseif (!is_numeric($_POST['costo']) || $_POST['costo'] <= 0) {
            $mensaje = "El costo debe ser un número válido mayor que cero.";
        } else {
            // Usamos el modelo para crear el servicio
            $this->servicio->descripcion = $_POST['descripcion'];
            $this->servicio->costo = $_POST['costo'];
    
            if ($this->servicio->crearServicio()) {
                $mensaje = "Servicio creado exitosamente.";
            } else {
                $mensaje = "El servicio ya está registrado.";
            }
        }
    
        // Asignar el mensaje al template para mostrarlo
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/crearServicio.tpl');
    }
    
    

    // Modificar un servicio existente
    public function modificarServicio() {
        $mensaje = ''; // Variable para el mensaje de éxito o error
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $idServicio = isset($_POST['id']) ? $_POST['id'] : '';
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $costo = isset($_POST['costo']) ? $_POST['costo'] : '';
        
            // Validar los datos recibidos
            if (empty($idServicio) || empty($descripcion) || empty($costo)) {
                $mensaje = "El ID del servicio, la descripción y el costo son obligatorios.";
            } elseif (!is_numeric($idServicio) || $idServicio <= 0) {
                $mensaje = "El ID del servicio debe ser un número válido mayor que cero.";
            } elseif (!is_numeric($costo) || $costo <= 0) {
                $mensaje = "El costo debe ser un número válido mayor que cero.";
            } else {
                // Verificar si el servicio con el ID proporcionado existe en la base de datos
                $queryVerificar = "SELECT COUNT(*) FROM servicios WHERE id = :id";
                $stmtVerificar = $this->db->prepare($queryVerificar);
                $stmtVerificar->bindParam(':id', $idServicio);
                $stmtVerificar->execute();
                $result = $stmtVerificar->fetchColumn();
        
                if ($result == 0) {
                    // Si no existe el servicio con el ID proporcionado
                    $mensaje = "El servicio con ID '$idServicio' no existe.";
                } else {
                    // Asignar los datos al modelo
                    $this->servicio->id = $idServicio;
                    $this->servicio->descripcion = $descripcion;
                    $this->servicio->costo = $costo;
        
                    // Llamar al método modificarServicio del modelo
                    if ($this->servicio->modificarServicio()) {
                        $mensaje = "Servicio con ID '$idServicio' modificado exitosamente.";
                    } else {
                        $mensaje = "Error al modificar el servicio. Intenta nuevamente.";
                    }
                }
            }
        } else {
            $mensaje = "Método de solicitud no permitido.";
        }
    
        // Asignar el mensaje al template para mostrarlo
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/modificarServicio.tpl');
    }
    

    public function eliminarServicio() {
        $mensaje = ''; // Variable para el mensaje de éxito o error
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener el ID del servicio desde el formulario
            $idServicio = isset($_POST['id']) ? $_POST['id'] : '';
    
            // Validación de los datos
            if (empty($idServicio)) {
                $mensaje = "El ID del servicio es obligatorio.";
            } elseif (!is_numeric($idServicio) || $idServicio <= 0) {
                $mensaje = "El ID debe ser un número válido mayor que cero.";
            } else {
                // Asignar el ID al objeto del modelo
                $this->servicio->id = $idServicio;
    
                // Llamar al método eliminarServicio del modelo
                $resultado = $this->servicio->eliminarServicio();
    
                // Asignar el mensaje basado en el resultado
                if ($resultado === true) {
                    $mensaje = "Servicio con ID '$idServicio' eliminado exitosamente.";
                } else {
                    $mensaje = $resultado; // El mensaje de error proveniente del modelo
                }
            }
        } else {
            $mensaje = "Método de solicitud no permitido.";
        }
    
        // Asignar el mensaje a la plantilla para mostrarlo
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/eliminarServicio.tpl');
    }
    

    public function listarServicios() {
        // Obtener todos los servicios
        $stmt = $this->servicio->obtenerServicios();
        $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Asignar los servicios a la vista
        // Usamos la instancia global de Smarty para pasar los datos a la plantilla
        global $smarty;
        $smarty->assign('servicios', $servicios);
        $smarty->display('listarServicios.tpl');  // Esta es la plantilla para mostrar los servicios
    }

}
?>
