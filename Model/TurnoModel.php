<?php

class Turno {
    private $db;
    public $id;
    public $fecha;
    public $hora;
    public $descripcion;
    public $patente;
    public $table = "turnos";  // Nombre de la tabla en la base de datos

    public function __construct($db) {
        $this->db = $db;
    }

    // Método para crear un turno
    public function crearTurno() {
        // Verificar si la patente existe en la tabla vehiculos
        $query = "SELECT COUNT(*) FROM vehiculos WHERE patente = :patente";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);
        $stmt->execute();
        $existePatente = $stmt->fetchColumn();
    
        if ($existePatente == 0) {
            return "Error: La patente no existe en la base de datos.";
        }
    
        // Verificar si ya existe un turno para esa patente en la misma fecha y hora
        $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE patente = :patente AND fecha = :fecha AND hora = :hora";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':hora', $this->hora);
        $stmt->execute();
        $result = $stmt->fetchColumn();
    
        // Si ya existe un turno en esa fecha y hora para esa patente, devolver un mensaje de error
        if ($result > 0) {
            return "Error: Ya existe un turno para esta patente en la fecha y hora seleccionadas.";
        }
    
        // Si no existe, proceder con la creación del turno
        $query = "INSERT INTO " . $this->table . " (fecha, hora, descripcion, patente) 
                  VALUES (:fecha, :hora, :descripcion, :patente)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':hora', $this->hora);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':patente', $this->patente);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return "Error: No se pudo crear el turno.";
        }
    }

    // Método para obtener todos los turnos
    public function obtenerTurnos() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para obtener un turno por ID
    public function obtenerTurnoPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para eliminar un turno
    public function eliminarTurno() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

   
    public function modificarTurno() {
        // Verificar si el turno con el ID proporcionado existe
        $queryVerificar = "SELECT COUNT(*) FROM turnos WHERE id = :id";
        $stmtVerificar = $this->db->prepare($queryVerificar);
        $stmtVerificar->bindParam(':id', $this->id);
        $stmtVerificar->execute();
        $result = $stmtVerificar->fetchColumn();
    
        // Si no se encuentra el turno con el ID proporcionado, retornar false
        if ($result == 0) {
            return false;
        }
    
        // Preparar la consulta para modificar el turno
        $queryModificar = "UPDATE turnos 
                           SET fecha = :fecha, hora = :hora, descripcion = :descripcion, patente = :patente 
                           WHERE id = :id";
        $stmtModificar = $this->db->prepare($queryModificar);
    
        // Limpiar los datos
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->hora = htmlspecialchars(strip_tags($this->hora));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->patente = htmlspecialchars(strip_tags($this->patente));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        // Enlazar los parámetros
        $stmtModificar->bindParam(':fecha', $this->fecha);
        $stmtModificar->bindParam(':hora', $this->hora);
        $stmtModificar->bindParam(':descripcion', $this->descripcion);
        $stmtModificar->bindParam(':patente', $this->patente);
        $stmtModificar->bindParam(':id', $this->id);
    
        // Ejecutar la consulta y devolver el resultado
        return $stmtModificar->execute();
    }
    
}

?>
