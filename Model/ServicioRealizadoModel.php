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
        // Verificar si el servicio existe
        $queryServicio = "SELECT id FROM servicios WHERE id = :servicios_id";
        $stmtServicio = $this->db->prepare($queryServicio);
        $stmtServicio->bindParam(':servicios_id', $this->servicios_id);
        $stmtServicio->execute();

        if ($stmtServicio->rowCount() == 0) {
            return "El servicio no existe.";
        }

        // Verificar si el turno existe
        $queryTurno = "SELECT id FROM turnos WHERE id = :turnos_id";
        $stmtTurno = $this->db->prepare($queryTurno);
        $stmtTurno->bindParam(':turnos_id', $this->turnos_id);
        $stmtTurno->execute();

        if ($stmtTurno->rowCount() == 0) {
            return "El turno no existe.";
        }

        // Verificar si ya existe un registro con la misma combinación de servicio y turno
        $queryDuplicado = "SELECT id FROM servicios_realizados WHERE servicios_id = :servicios_id AND turnos_id = :turnos_id";
        $stmtDuplicado = $this->db->prepare($queryDuplicado);
        $stmtDuplicado->bindParam(':servicios_id', $this->servicios_id);
        $stmtDuplicado->bindParam(':turnos_id', $this->turnos_id);
        $stmtDuplicado->execute();

        if ($stmtDuplicado->rowCount() > 0) {
            return "Ya existe un servicio realizado con la misma combinación de servicio y turno.";
        }

        // Si todas las validaciones pasan, proceder con la inserción
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

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return "Error al crear el registro: " . $e->getMessage();
    }
}

public function obtenerServiciosRealizados() {
    try {
        $query = "SELECT sr.id AS servicio_realizado_id, sr.notas AS servicio_realizado_notas, 
                         s.id AS servicio_id, s.descripcion AS servicio_nombre, s.costo AS servicio_costo, 
                         t.id AS turno_id, t.fecha AS turno_fecha, t.hora AS turno_hora
                  FROM servicios_realizados sr  -- Nombre de la tabla explicitamente
                  JOIN servicios s ON sr.servicios_id = s.id
                  JOIN turnos t ON sr.turnos_id = t.id";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Manejar el error (log, mostrar mensaje, etc.)
        error_log("Error al obtener servicios realizados: " . $e->getMessage());
        return false; // O un array vacío, o lanzar la excepción, según tu necesidad
    }
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
    
        // Verificar si la nueva combinación de servicios_id y turnos_id ya existe en otro registro
        $queryDuplicado = "SELECT id 
                           FROM " . $this->table . " 
                           WHERE servicios_id = :servicios_id 
                           AND turnos_id = :turnos_id 
                           AND id != :id"; // Excluir el registro que se está modificando
        $stmtDuplicado = $this->db->prepare($queryDuplicado);
        $stmtDuplicado->bindParam(':servicios_id', $this->servicios_id);
        $stmtDuplicado->bindParam(':turnos_id', $this->turnos_id);
        $stmtDuplicado->bindParam(':id', $this->id);
        $stmtDuplicado->execute();
    
        if ($stmtDuplicado->rowCount() > 0) {
            echo "Ya existe un servicio realizado con la misma combinación de servicio y turno.";
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
        public function detalleTurnoConCostoTotal($turnos_id) {
            try {
                // Consulta SQL
                $query = "
                    SELECT
                        t.id AS turnos_id,
                        t.fecha,
                        t.hora,
                        t.descripcion AS descripcion_turno,
                        v.patente,
                        CONCAT(c.nombre, ' ', c.apellido) AS cliente,
                        SUM(s.costo) AS total_gastado
                    FROM
                        servicios_realizados sr
                        JOIN servicios s ON sr.servicios_id = s.id
                        JOIN turnos t ON sr.turnos_id = t.id
                        JOIN vehiculos v ON t.patente = v.patente
                        JOIN clientes c ON v.dni_cliente = c.dni
                    WHERE
                        t.id = :turnos_id
                    GROUP BY
                        t.id, t.fecha, t.hora, t.descripcion, v.patente, c.nombre, c.apellido
                ";
        
                // Preparar la consulta
                $stmt = $this->db->prepare($query);
        
                // Enlazar el parámetro
                $stmt->bindParam(':turnos_id', $turnos_id, PDO::PARAM_INT);
        
                // Ejecutar la consulta
                $stmt->execute();
        
                // Obtener el resultado
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
                // Verificar si se encontraron resultados
                if ($resultado) {
                    return $resultado; // Devuelve un array asociativo con los datos
                } else {
                    return "No se encontraron detalles para el turno con ID " . $turnos_id;
                }
            } catch (PDOException $e) {
                return "Error al obtener el detalle del turno: " . $e->getMessage();
            }
        }
    }
    
    
    

?>
