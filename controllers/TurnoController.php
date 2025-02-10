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
    
            // Validar que los campos obligatorios no estén vacíos
            if (empty($this->turno->fecha) || empty($this->turno->hora) || empty($this->turno->descripcion) || empty($this->turno->patente)) {
                $mensaje = "Por favor, completa todos los campos obligatorios.";
            } else {
                // Llamar al método del modelo para crear el turno
                $resultado = $this->turno->crearTurno();
    
                if ($resultado === true) {
                    $mensaje = "Turno creado exitosamente.";
                } else {
                    $mensaje = $resultado; // Mostrar mensaje de error
                }
            }
        } else {
            $mensaje = "Método de solicitud no permitido.";
        }
    
        // Asignar el mensaje a la plantilla
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
    
        // Mostrar la plantilla 'crearTurno.tpl'
        $smarty->display('templates/crearTurno.tpl');
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
        
    public function obtenerTurnoPorId($id) {
        $turno = $this->turno->obtenerTurnoPorId($id);
        
        if ($turno) {
            echo json_encode($turno);
        } else {
            echo json_encode(["error" => "Turno no encontrado"]);
        }
    }


    public function modificarTurno() {
        $mensaje = '';
    
        // Verificar si la solicitud es POST
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
                    $mensaje = "Turno actualizado exitosamente.";
                } else {
                    // Si el turno no se encuentra o no se pudo modificar
                    $mensaje = "No existe un turno con el ID proporcionado.";
                }
            } else {
                // Si no se proporciona un ID
                $mensaje = "Falta el ID del turno.";
            }
        } else {
            // Si el método de solicitud no es POST
            $mensaje = "Método de solicitud no permitido.";
        }
    
        $smarty = new Smarty\Smarty();
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/modificarTurno.tpl');
    }
    

    // Método para eliminar un turno
    public function eliminarTurno() {
        $mensaje = ''; // Inicializar mensaje
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener el ID del turno a eliminar
            $idTurno = isset($_POST['id']) ? $_POST['id'] : '';
    
            // Validar que el ID no esté vacío
            if (empty($idTurno)) {
                $mensaje = "Por favor, ingrese un ID válido.";
            } else {
                // Realizar la eliminación del turno
                // Suponiendo que tienes un método en tu modelo para eliminar el turno
                // Asegúrate de que el modelo tenga un método para esto
    
                // Ejemplo de SQL para eliminar el turno
                $query = "DELETE FROM turnos WHERE id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':id', $idTurno, PDO::PARAM_INT);
    
                // Ejecutar la consulta
                $stmt->execute();
    
                // Verificar si se eliminó alguna fila (turno)
                if ($stmt->rowCount() > 0) {
                    $mensaje = "Turno eliminado.";
                } else {
                    // Si no se eliminó ninguna fila, el turno no existe
                    $mensaje = "El turno con ID $idTurno no existe.";
                }
            }
        } else {
            $mensaje = "Método de solicitud no permitido.";
        }
    
        // Asignar el mensaje a Smarty para mostrarlo en la plantilla
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/eliminarTurno.tpl');
    }   
    
}

?>
