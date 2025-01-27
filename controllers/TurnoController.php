<?php

include_once(__DIR__ . '/../Model/TurnoModel.php');  // Actualizamos el nombre del archivo del modelo

class TurnoController {
    private $db;
    public $turno;

    public function __construct($db) {
        $this->db = $db;
        $this->turno = new Turno($this->db); // Instancia del modelo Turno
    }

    // Método para crear un turno
    public function crearTurno() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $this->turno->setFecha(isset($_POST['fecha']) ? $_POST['fecha'] : '');
            $this->turno->setHora(isset($_POST['hora']) ? $_POST['hora'] : '');
            $this->turno->setDescripcion(isset($_POST['descripcion']) ? $_POST['descripcion'] : '');
            $this->turno->setPatente(isset($_POST['patente']) ? $_POST['patente'] : '');

            // Llamar al método del modelo para crear el turno
            $result = $this->turno->crearTurno();

            if ($result === true) {
                echo "¡Turno creado con éxito!";
            } else {
                echo $result; // Mostrar mensaje de error
            }
        } else {
            echo "Método de solicitud no permitido.";
        }
    }

    // Método para obtener todos los turnos
    public function obtenerTurnos() {
        $stmt = $this->turno->obtenerTurnos();
        $turnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($turnos);
    }

    // Método para obtener un turno por ID
    public function obtenerTurnoPorId($id) {
        $this->turno->setId($id);
        $turno = $this->turno->obtenerTurnoPorId();
        echo json_encode($turno);
    }

    // Método para eliminar un turno
    public function eliminarTurno($id) {
        $this->turno->setId($id);

        if ($this->turno->eliminarTurno()) {
            echo "Turno eliminado con éxito.";
        } else {
            echo "Error al eliminar el turno.";
        }
    }
}

?>
