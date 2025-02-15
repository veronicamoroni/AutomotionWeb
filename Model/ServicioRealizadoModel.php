<?php
class ServicioRealizado {
    private $db;
    public $table = "servicios_realizados"; // Nombre de la tabla
    public $id;
    public $servicios_id;
    public $turnos_id;
    public $notas;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo registro en ServicioRealizado
    public function crearServicioRealizado() {
        try {
            $query = "INSERT INTO " . $this->table . " (servicios_id, turnos_id, notas) VALUES (:servicios_id, :turnos_id, :notas)";
            $stmt = $this->db->prepare($query);

            // Limpiar los datos
            $this->servicios_id = htmlspecialchars(strip_tags($this->servicios_id));
            $this->turnos_id = htmlspecialchars(strip_tags($this->turnos_id));
            $this->notas = htmlspecialchars(strip_tags($this->notas));

            // Enlazar parámetros
            $stmt->bindParam(':servicios_id', $this->servicios_id);
            $stmt->bindParam(':turnos_id', $this->turnos_id);
            $stmt->bindParam(':notas', $this->notas);

            return $stmt->execute();
        } catch (PDOException $e) {
            return "Error al crear el registro: " . $e->getMessage();
        }
    }


    
    public function obtenerServiciosRealizados() {
        $query = "SELECT sr.id, sr.notas, 
                         s.id AS servicio_id, s.descripcion AS servicio_nombre, s.costo, 
                         t.id AS turno_id, t.fecha AS fecha_turno, t.hora AS hora_turno
                  FROM " . $this->table . " sr
                  JOIN servicios s ON sr.servicios_id = s.id
                  JOIN turnos t ON sr.turnos_id = t.id";
    
        // Preparar y ejecutar la consulta
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        // Retornar los resultados como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
    
    
    // Obtener un registro específico por ID
    public function obtenerServicioRealizadoPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function modificarServicioRealizado() {
        // Validar si el servicio realizado existe y si el turno y servicio son válidos en una sola consulta
        $queryValidar = "SELECT sr.id 
                         FROM " . $this->table . " sr
                         JOIN turnos t ON t.id = :turnos_id
                         JOIN servicios s ON s.id = :servicios_id
                         WHERE sr.id = :id";
                         
        $stmtValidar = $this->db->prepare($queryValidar);
        $stmtValidar->bindParam(':id', $this->id);
        $stmtValidar->bindParam(':turnos_id', $this->turnos_id);
        $stmtValidar->bindParam(':servicios_id', $this->servicios_id);
        $stmtValidar->execute();
    
        if (!$stmtValidar->fetch()) {
            echo "El servicio realizado con ID {$this->id} no existe o el turno/servicio no es válido.";
            return false;
        }
    
        // Modificar el servicio realizado
        $queryModificar = "UPDATE " . $this->table . " 
                           SET notas = :notas, turnos_id = :turnos_id, servicios_id = :servicios_id
                           WHERE id = :id";
        $stmtModificar = $this->db->prepare($queryModificar);
    
        // Enlazar parámetros y ejecutar
        $stmtModificar->execute([
            ':notas' => htmlspecialchars(strip_tags($this->notas)),
            ':turnos_id' => htmlspecialchars(strip_tags($this->turnos_id)),
            ':servicios_id' => htmlspecialchars(strip_tags($this->servicios_id)),
            ':id' => htmlspecialchars(strip_tags($this->id))
        ]);
    
        echo "Registro de servicio realizado modificado con éxito.";
        return true;
    }
    

    
        public function eliminarServicioRealizado() {
            try {
                // Verificar si el servicio realizado con el ID existe
                $queryVerificar = "SELECT COUNT(*) FROM " . $this->table . " WHERE id = :id";
                $stmtVerificar = $this->db->prepare($queryVerificar);
                $stmtVerificar->bindParam(':id', $this->id, PDO::PARAM_INT);
                $stmtVerificar->execute();
                
                if ($stmtVerificar->fetchColumn() == 0) {
                    return "El servicio realizado con ID " . $this->id . " no existe.";
                }
    
                // Intentar eliminar el servicio realizado
                $query = "DELETE FROM " . $this->table . " WHERE id = :id";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
                
                if ($stmt->execute()) {
                    return "Servicio realizado eliminado con éxito.";
                }
    
            } catch (PDOException $e) {
                return "Error al eliminar el servicio realizado: " . $e->getMessage();
            }
        }
    }
    
    
    

?>
