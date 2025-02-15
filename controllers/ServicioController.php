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
        // Obtener datos de la solicitud POST (solo descripción y costo)
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $costo = isset($_POST['costo']) ? $_POST['costo'] : null;
    
        if (empty($descripcion) || empty($costo)) {
            // Validación en caso de que los campos sean vacíos
            echo "Descripción y costo son obligatorios.";
            return;
        }
    
        // Crear un nuevo servicio
        $this->servicio->descripcion = $descripcion;
        $this->servicio->costo = $costo;
    
        if ($this->servicio->crearServicio()) {
            // Mostrar mensaje de éxito
            echo "Servicio creado exitosamente.";
        } else {
            // Mostrar mensaje de error
            echo "Error al crear el servicio.";
        }
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
    
   
    
        public function eliminarServicioRealizado() {
            if (isset($_POST['id'])) {
                $this->realizado->id = $_POST['id'];
    
                $mensaje = $this->realizado->eliminarServicioRealizado();
                echo $mensaje;
            } else {
                echo "Falta el ID del servicio realizado.";
            }
        }
    
    

    public function listarServicios() {
        // Obtener todos los servicios
        $stmt = $this->servicio->obtenerServicios();
        $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
    }

}
?>
