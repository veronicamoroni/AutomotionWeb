<?php

class Turno {
    private $db;
    private $id;
    private $fecha;
    private $hora;
    private $descripcion;
    private $patente;
    private $table = "turnos";  // Nombre de la tabla en la base de datos

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

    // Métodos setters y getters
    public function setId($id) { $this->id = $id; }
    public function setFecha($fecha) { $this->fecha = $fecha; }
    public function setHora($hora) { $this->hora = $hora; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setPatente($patente) { $this->patente = $patente; }
}

?>
