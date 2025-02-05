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

    // Obtener todos los registros de ServicioRealizado
    public function obtenerServiciosRealizados() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtener un registro específico por ID
    public function obtenerServicioRealizadoPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Modificar un registro en ServicioRealizado
    public function modificarServicioRealizado() {
        $query = "UPDATE " . $this->table . " SET notas = :notas WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $this->notas = htmlspecialchars(strip_tags($this->notas));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':notas', $this->notas);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    // Eliminar un registro en ServicioRealizado
    public function eliminarServicioRealizado() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }
}
?>
