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
            // Obtener los datos del formulario y asignarlos directamente a los atributos de la clase
            $this->turno->fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
            $this->turno->hora = isset($_POST['hora']) ? $_POST['hora'] : '';
            $this->turno->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $this->turno->patente = isset($_POST['patente']) ? $_POST['patente'] : '';
    
            // Validación de los campos obligatorios
            if (empty($this->turno->fecha) || empty($this->turno->hora) || empty($this->turno->descripcion) || empty($this->turno->patente)) {
                $mensaje = "Por favor, completa todos los campos obligatorios.";
            } else {
                // Llamar al método del modelo para crear el turno
                $resultado = $this->turno->crearTurno();
    
                // Mostrar el mensaje de acuerdo al resultado
                if ($resultado === true) {
                    $mensaje = "Turno creado exitosamente.";
                } else {
                    $mensaje = $resultado; // Mostrar el mensaje de error retornado por el modelo
                }
            }
        } else {
            $mensaje = "Método de solicitud no permitido.";
        }
    
        // Asignar el mensaje a la plantilla
        $smarty = new Smarty\Smarty;
        $smarty->assign('mensaje', $mensaje);
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
        $mensaje = ''; // Inicializar el mensaje
    
        // Verificar si la solicitud es POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos enviados por el formulario
            $this->turno->id = isset($_POST['id']) ? $_POST['id'] : '';
            $this->turno->fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
            $this->turno->hora = isset($_POST['hora']) ? $_POST['hora'] : '';
            $this->turno->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $this->turno->patente = isset($_POST['patente']) ? $_POST['patente'] : '';
    
            // Verificar que todos los campos obligatorios estén completos
            if (empty($this->turno->id) || empty($this->turno->fecha) || empty($this->turno->hora) || empty($this->turno->descripcion) || empty($this->turno->patente)) {
                $mensaje = "Todos los campos son obligatorios.";
            } else {
                // Llamar al método del modelo para modificar el turno
                $resultado = $this->turno->modificarTurno();
    
                if ($resultado === true) {
                    $mensaje = "Turno actualizado exitosamente.";
                } else {
                    $mensaje = $resultado; // Mostrar mensaje de error si no se pudo modificar
                }
            }
        } else {
            // Si el método de solicitud no es POST
            $mensaje = "Método de solicitud no permitido.";
        }
    
        // Asignar el mensaje a la plantilla
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
            } elseif (!is_numeric($idTurno) || $idTurno <= 0) {
                $mensaje = "El ID debe ser un número válido mayor que cero.";
            } else {
                // Asignar el ID al objeto del modelo
                $this->turno->id = $idTurno;
                
                // Llamar al método del modelo para eliminar el turno
                $resultado = $this->turno->eliminarTurno();
    
                if ($resultado === true) {
                    $mensaje = "Turno eliminado exitosamente.";
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
        $smarty->display('templates/eliminarTurno.tpl');
    }
       
}
?>
