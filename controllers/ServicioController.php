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
            // Comprobar si el servicio ya existe en la base de datos
            $descripcion = $_POST['descripcion'];
    
            // Suponiendo que tienes una tabla 'servicios' y una columna 'descripcion'
            $query = "SELECT COUNT(*) FROM servicios WHERE descripcion = :descripcion";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->execute();
            $count = $stmt->fetchColumn();
    
            if ($count > 0) {
                // Si ya existe un servicio con esa descripción
                $mensaje = "El servicio '$descripcion' ya está registrado.";
            } else {
                // Si no existe, proceder a registrar el servicio
                $costo = $_POST['costo'];
                $insertQuery = "INSERT INTO servicios (descripcion, costo) VALUES (:descripcion, :costo)";
                $insertStmt = $this->db->prepare($insertQuery);
                $insertStmt->bindParam(':descripcion', $descripcion);
                $insertStmt->bindParam(':costo', $costo);
                $insertStmt->execute();
    
                $mensaje = "Servicio '$descripcion' creado exitosamente.";
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
                // Comprobar si el servicio existe en la base de datos
                $query = "SELECT COUNT(*) FROM servicios WHERE id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':id', $idServicio);
                $stmt->execute();
                $count = $stmt->fetchColumn();
    
                if ($count == 0) {
                    // Si no existe el servicio con ese ID
                    $mensaje = "El servicio con ID '$idServicio' no existe.";
                } else {
                    // Si existe, proceder a modificar el servicio
                    $updateQuery = "UPDATE servicios SET descripcion = :descripcion, costo = :costo WHERE id = :id";
                    $updateStmt = $this->db->prepare($updateQuery);
                    $updateStmt->bindParam(':id', $idServicio);
                    $updateStmt->bindParam(':descripcion', $descripcion);
                    $updateStmt->bindParam(':costo', $costo);
                    $updateStmt->execute();
    
                    $mensaje = "Servicio con ID '$idServicio' modificado exitosamente.";
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
        // Validación de los datos del formulario
        if (empty($_POST['id'])) {
            $mensaje = "El ID del servicio es obligatorio.";
        } elseif (!is_numeric($_POST['id']) || $_POST['id'] <= 0) {
            $mensaje = "El ID debe ser un número válido mayor que cero.";
        } else {
            // Obtener el ID del servicio desde el formulario
            $idServicio = $_POST['id'];
    
            // Comprobar si el servicio existe en la base de datos
            $query = "SELECT COUNT(*) FROM servicios WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $idServicio);
            $stmt->execute();
            $count = $stmt->fetchColumn();
    
            if ($count == 0) {
                // Si no existe el servicio con ese ID
                $mensaje = "El servicio con ID '$idServicio' no existe.";
            } else {
                // Si existe, proceder a eliminar el servicio
                $deleteQuery = "DELETE FROM servicios WHERE id = :id";
                $deleteStmt = $this->db->prepare($deleteQuery);
                $deleteStmt->bindParam(':id', $idServicio);
                $deleteStmt->execute();
    
                $mensaje = "Servicio con ID '$idServicio' eliminado exitosamente.";
            }
        }
    
        // Asignar el mensaje al template para mostrarlo
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
