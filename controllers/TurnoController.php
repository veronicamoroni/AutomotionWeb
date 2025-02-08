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
        $mensaje = ''; // Inicializar el mensaje para mostrar en la página
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario y asignarlos directamente a los atributos de la clase
            $this->turno->fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
            $this->turno->hora = isset($_POST['hora']) ? $_POST['hora'] : '';
            $this->turno->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $this->turno->patente = isset($_POST['patente']) ? $_POST['patente'] : '';
    
            // Llamar al método del modelo para crear el turno
            $result = $this->turno->crearTurno();
    
            if ($result === true) {
                $mensaje = "¡Turno creado con éxito!";
            } else {
                $mensaje = $result; // Mostrar mensaje de error
            }
        } else {
            $mensaje = "Método de solicitud no permitido.";
        }
    
        echo $mensaje;
    }

    
    public function obtenerTurnos() {
        
        $stmt = $this->turno->obtenerTurnos();
        $turnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // convertir la fecha al formato dd-mm-aaaa
        foreach ($turnos as &$turno) {
            $turno['fecha'] = date('d-m-Y', strtotime($turno['fecha']));
        }
        return $turnos;
    }
        

   

    // Método para eliminar un turno
    public function eliminarTurno() {
        // Obtener el id del turno desde la solicitud POST
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
    
            // Llamar al método eliminarTurno() del modelo y pasarle el id
            $this->turno->id = $id;
    
            // Intentar eliminar el turno
            if ($this->turno->eliminarTurno()) {
                echo "Turno eliminado con éxito.";
            } else {
                echo "El turno no existe."; // Si no existe, mostrar este mensaje
            }
        } else {
            echo "ID del turno no proporcionado.";
        }
    }  
    

    public function modificarTurno() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos enviados por el formulario
            $this->turno->id = isset($_POST['id']) ? $_POST['id'] : '';
            $this->turno->fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
            $this->turno->hora = isset($_POST['hora']) ? $_POST['hora'] : '';
            $this->turno->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $this->turno->patente = isset($_POST['patente']) ? $_POST['patente'] : '';
    
            // Verificar que el ID no esté vacío
            if (!empty($this->turno->id)) {
                // Llamar al método del modelo para modificar el turno
                if ($this->turno->modificarTurno()) {
                    // Si la actualización es exitosa
                    echo "¡Turno actualizado con éxito!";
                } else {
                    // Si el turno no se encuentra o no se pudo modificar
                    echo "No existe un turno con el ID proporcionado.";
                }
            } else {
                // Si no se proporciona un ID
                echo "Falta el ID del turno.";
            }
        } else {
            // Si el método de solicitud no es POST
            echo "Método de solicitud no permitido.";
        }
    }
    
}

?>
