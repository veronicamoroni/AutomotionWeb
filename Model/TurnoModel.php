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
        try {
            // Verificar si la patente existe en la tabla vehiculos
            $query = "SELECT COUNT(*) FROM vehiculos WHERE patente = :patente";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':patente', $this->patente);
            $stmt->execute();
            $existePatente = $stmt->fetchColumn();
    
            if ($existePatente == 0) {
                throw new Exception("Error: La patente no existe en la base de datos.");
            }
    
            // Verificar si ya existe un turno para esa patente en la misma fecha y hora
            $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE patente = :patente AND fecha = :fecha AND hora = :hora";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':patente', $this->patente);
            $stmt->bindParam(':fecha', $this->fecha);
            $stmt->bindParam(':hora', $this->hora);
            $stmt->execute();
            $result = $stmt->fetchColumn();
    
            if ($result > 0) {
                throw new Exception("Error: Ya existe un turno para esta patente en la fecha y hora seleccionadas.");
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
                throw new Exception("Error: No se pudo crear el turno.");
            }
        } catch (Exception $e) {
            return $e->getMessage(); // Devuelve el mensaje de error
        }
    }
    
    public function modificarTurno() {
        try {
            // Limpiar los datos de entrada
            $this->fecha = htmlspecialchars(strip_tags($this->fecha));
            $this->hora = htmlspecialchars(strip_tags($this->hora));
            $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
            $this->patente = htmlspecialchars(strip_tags($this->patente));
            $this->id = htmlspecialchars(strip_tags($this->id));
    
            // Preparar la consulta para modificar el turno
            $queryModificar = "UPDATE " . $this->table . " 
                               SET fecha = :fecha, hora = :hora, descripcion = :descripcion, patente = :patente 
                               WHERE id = :id";
            $stmtModificar = $this->db->prepare($queryModificar);
    
            // Enlazar los parámetros
            $stmtModificar->bindParam(':fecha', $this->fecha);
            $stmtModificar->bindParam(':hora', $this->hora);
            $stmtModificar->bindParam(':descripcion', $this->descripcion);
            $stmtModificar->bindParam(':patente', $this->patente);
            $stmtModificar->bindParam(':id', $this->id);
    
            // Ejecutar la consulta
            $stmtModificar->execute();
    
            // Verificar si se actualizó alguna fila
            if ($stmtModificar->rowCount() > 0) {
                return true; // La actualización fue exitosa
            } else {
                return "No se encontró el turno con ID $this->id."; // No se encontró el turno para actualizar
            }
        } catch (PDOException $e) {
            // Manejo de excepciones
            return "Error al modificar el turno: " . $e->getMessage();
        }
    }    


    // Método para eliminar un turno
    public function eliminarTurno() {
        try {
            // Intentamos eliminar el turno directamente
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            
            // Verificamos si se eliminó alguna fila
            if ($stmt->rowCount() > 0) {
                return true; // El turno se eliminó exitosamente
            } else {
                return "El turno con ID $this->id no existe."; // No se eliminó nada, el turno no existía
            }
        } catch (PDOException $e) {
            // Manejo de excepciones, si algo falla al ejecutar la consulta
            return "Error al eliminar el turno: " . $e->getMessage();
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
    
}

?>
