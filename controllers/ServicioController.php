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
        $servicio = new Servicio($this->db);
        $servicio->descripcion = $descripcion;
        $servicio->costo = $costo;
    
        if ($servicio->crearServicio()) {
            // Mostrar mensaje de éxito
            echo "Servicio creado exitosamente.";
        } else {
            // Mostrar mensaje de error
            echo "Error al crear el servicio.";
        }
    }
    

    // Modificar un servicio existente
    public function modificarServicio() {
        // Obtener los datos enviados desde el formulario
        $id = isset($_POST['id']) ? $_POST['id'] : die("Falta el ID.");
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : die("Falta la descripción.");
        $costo = isset($_POST['costo']) ? $_POST['costo'] : die("Falta el costo.");

        // Asignar los valores a la instancia del servicio
        $this->servicio->id = $id;
        $this->servicio->descripcion = $descripcion;
        $this->servicio->costo = $costo;

        // Llamar al método de la clase Servicio para modificar el servicio
        if ($this->servicio->modificarServicio()) {
            // Redirigir después de modificar el servicio
            header("Location: /menu/listarServicios");
            exit();
        } else {
            echo "Error al modificar el servicio.";
        }
    }

    // Eliminar un servicio
    public function eliminarServicio() {
        // Obtener el ID del servicio a eliminar
        $id = isset($_POST['id']) ? $_POST['id'] : die("Falta el ID.");

        // Asignar el ID a la instancia del servicio
        $this->servicio->id = $id;

        // Llamar al método de la clase Servicio para eliminar el servicio
        if ($this->servicio->eliminarServicio()) {
            // Redirigir después de eliminar el servicio
            header("Location: /menu/listarServicios");
            exit();
        } else {
            echo "Error al eliminar el servicio.";
        }
    }

    // Listar todos los servicios
    public function listarServicios() {
        // Obtener todos los servicios
        $stmt = $this->servicio->obtenerServicios();
        $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Asignar los servicios a la vista
        require_once './views/listarServiciosView.php';
    }

    // Obtener un servicio por su ID
    public function obtenerServicioPorId() {
        $id = isset($_GET['id']) ? $_GET['id'] : die("Falta el ID.");

        // Asignar el ID a la instancia del servicio
        $this->servicio->id = $id;

        // Obtener el servicio
        $this->servicio->obtenerServicioPorId();

        // Asignar los datos a la vista
        require_once './views/editarServicioView.php';
    }
}
?>
