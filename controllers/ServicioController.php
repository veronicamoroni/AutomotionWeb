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
        // Obtener los datos del formulario
        $this->servicio->id = $_POST['id'];
        $this->servicio->descripcion = $_POST['descripcion'];
        $this->servicio->costo = $_POST['costo'];
    
        // Llamar al método modificarServicio() del modelo
        if ($this->servicio->modificarServicio()) {
            echo "Servicio modificado con éxito.";
        } else {
            echo "El servicio No existe.";
        }
    }
    

    public function eliminarServicio() {
        if (isset($_POST['id'])) {
            $id = $_POST['id']; // Obtener el ID del servicio
            $this->servicio->id = $id; // Asignar el ID al objeto del modelo
    
            // Llamar al método de eliminación del modelo
            $resultado = $this->servicio->eliminarServicio();
    
            if ($resultado === true) {
                echo '<div class="alert alert-success">Servicio eliminado con éxito.</div>';
            } else {
                echo '<div class="alert alert-warning">' . $resultado . '</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Falta el ID del servicio.</div>';
        }
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
