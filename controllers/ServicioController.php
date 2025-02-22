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
    public function eliminarServicio() {
        // Verificar si el ID del servicio se pasa por POST
        if (isset($_POST['id'])) {
            $id = $_POST['id']; // Obtener el ID del servicio
            $this->servicio->id = $id; // Asignar el ID al objeto del modelo Servicio
    
            // Llamar al método de eliminación del modelo y capturar el mensaje de retorno
            $mensaje = $this->servicio->eliminarServicio();
    
            // Mostrar el mensaje de resultado
            echo $mensaje;
        } else {
            // En caso de que no se pase el ID, mostrar mensaje de error
            echo "Falta el ID del servicio.";
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
