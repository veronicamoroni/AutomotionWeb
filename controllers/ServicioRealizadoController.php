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
        $this->realizado->id = isset($_POST['id']) ? $_POST['id'] : null;
        $this->realizado->notas = isset($_POST['notas']) ? $_POST['notas'] : null;

        if (empty($this->realizado->id) || empty($this->realizado->notas)) {
            echo "Falta el ID o las notas.";
            return;
        }

        if ($this->realizado->modificarServicioRealizado()) {
            echo "Registro de servicio realizado modificado con éxito.";
        } else {
            echo "Error al modificar el registro de servicio realizado.";
        }
    }

    // Eliminar un registro de servicio realizado
    public function eliminarServicioRealizado() {
        if (isset($_POST['id'])) {
            $this->realizado->id = $_POST['id'];

            if ($this->realizado->eliminarServicioRealizado()) {
                echo "Registro de servicio realizado eliminado con éxito.";
            } else {
                echo "Error al eliminar el registro de servicio realizado.";
            }
        } else {
            echo "Falta el ID del registro de servicio realizado.";
        }
    }
    // Listar todos los servicios realizados
    public function obtenerServiciosRealizados() {
        // Obtener todos los registros
        $stmt = $this->realizado->obtenerServiciosRealizados();
        $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $servicios;
        
    }
}
?>
