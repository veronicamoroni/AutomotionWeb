<?php
require_once './Model/ServicioRealizadoModel.php';

class ServicioRealizadoController {
    private $db;
    private $realizado;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
        $this->realizado = new ServicioRealizado($this->db);
    }

    // Crear un nuevo registro de servicio realizado
    public function crearServicioRealizado() {
        // Obtener datos de la solicitud POST
        $this->realizado->servicios_id = isset($_POST['servicios_id']) ? $_POST['servicios_id'] : null;
        $this->realizado->turnos_id = isset($_POST['turnos_id']) ? $_POST['turnos_id'] : null;
        $this->realizado->notas = isset($_POST['notas']) ? $_POST['notas'] : null;

        if (empty($this->realizado->servicios_id) || empty($this->realizado->turnos_id) || empty($this->realizado->notas)) {
            echo "Todos los campos son obligatorios.";
            return;
        }

        if ($this->realizado->crearServicioRealizado()) {
            echo "Servicio realizado registrado exitosamente.";
        } else {
            echo "Error al registrar el servicio realizado.";
        }
    }

   // Modificar un servicio realizado existente
public function modificarServicioRealizado() {
    // Obtener los datos del formulario
    $servicios_realizados_id = isset($_POST['servicios_realizados_id']) ? $_POST['servicios_realizados_id'] : null;
    $notas = isset($_POST['notas']) ? $_POST['notas'] : null;
    $turnos_id = isset($_POST['turnos_id']) ? $_POST['turnos_id'] : null;
    $servicios_id = isset($_POST['servicios_id']) ? $_POST['servicios_id'] : null;

    // Validar que todos los campos necesarios estén presentes
    if (empty($servicios_realizados_id) || empty($notas) || empty($turnos_id) || empty($servicios_id)) {
        echo "Falta el ID del servicio realizado, las notas, el turno o el servicio.";
        return;
    }

    // Asignar los datos al objeto de servicio realizado
    $this->realizado->id = $servicios_realizados_id;
    $this->realizado->notas = $notas;
    $this->realizado->turnos_id = $turnos_id;
    $this->realizado->servicios_id = $servicios_id;

    // Llamar al método modificarServicioRealizado() para actualizar el servicio
    if ($this->realizado->modificarServicioRealizado()) {
        echo "Registro de servicio realizado modificado con éxito.";
    } else {
        echo "Error al modificar el registro de servicio realizado.";
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


    public function obtenerServiciosRealizados() {
        // Llamar al modelo para obtener los datos de los servicios realizados
        $servicios = $this->realizado->obtenerServiciosRealizados();
    
        // Devolver los datos a la vista
        return $servicios;
    }
    
    
}
?>
