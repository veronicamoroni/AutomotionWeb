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
        

   
    public function eliminarTurno() {
        if (!isset($_POST['id'])) {
            echo "ID del turno no proporcionado.";
            return;
        }
    
        // Asignar el ID al objeto turno
        $this->turno->id = $_POST['id'];
    
        // Ejecutar la eliminación y mostrar el mensaje resultante
        echo $this->turno->eliminarTurno();
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
            $resultado = $this->turno->modificarTurno();
            
            if ($resultado === true) {
                echo "¡Turno actualizado con éxito!";
            } elseif ($resultado === false) {
                echo "No existe un turno con el ID proporcionado.";
            } else {
                echo $resultado; // Mensaje de error por patente inexistente
            }
        } else {
            echo "Falta el ID del turno.";
        }
    } else {
        echo "Método de solicitud no permitido.";
    }
}

    
}

?>
