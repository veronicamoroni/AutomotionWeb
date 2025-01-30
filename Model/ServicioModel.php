<?php
class Servicio {
    private $db;
    public $table = "servicios"; // Nombre de la tabla para los servicios
    public $id;
    public $descripcion;
    public $costo;

    // Constructor, recibe la conexión a la base de datos
    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo servicio
    public function crearServicio() {
        try {
            // Preparar la consulta
            $query = "INSERT INTO " . $this->table . " (descripcion, costo) 
                      VALUES (:descripcion, :costo)";
            $stmt = $this->db->prepare($query);
    
            // Limpiar los datos
            $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
            $this->costo = htmlspecialchars(strip_tags($this->costo));
    
            // Enlazar los parámetros
            $stmt->bindParam(':descripcion', $this->descripcion);
            $stmt->bindParam(':costo', $this->costo);
    
            // Ejecutar la consulta
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Error al crear el servicio: " . $e->getMessage();
        }
    }
    
    // Modificar un servicio
    public function modificarServicio() {
        // Verificar si el servicio con el ID proporcionado existe
        $queryVerificar = "SELECT COUNT(*) FROM " . $this->table . " WHERE id = :id";
        $stmtVerificar = $this->db->prepare($queryVerificar);
        $stmtVerificar->bindParam(':id', $this->id);
        $stmtVerificar->execute();
        $result = $stmtVerificar->fetchColumn();
    
        // Si no se encuentra el servicio con el ID proporcionado, retornar false
        if ($result == 0) {
            return false;
        }
    
        // Preparar la consulta para modificar el servicio
        $queryModificar = "UPDATE " . $this->table . " 
                           SET descripcion = :descripcion, costo = :costo 
                           WHERE id = :id";
        $stmtModificar = $this->db->prepare($queryModificar);
    
        // Limpiar los datos
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->costo = htmlspecialchars(strip_tags($this->costo));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        // Enlazar los parámetros
        $stmtModificar->bindParam(':descripcion', $this->descripcion);
        $stmtModificar->bindParam(':costo', $this->costo);
        $stmtModificar->bindParam(':id', $this->id);
    
        // Ejecutar la consulta y devolver el resultado
        return $stmtModificar->execute();
    }
    
    // Eliminar un servicio
    public function eliminarServicio() {
        try {
            // Comprobamos si el servicio con el ID proporcionado existe
            $checkStmt = $this->db->prepare("SELECT COUNT(*) FROM " . $this->table . " WHERE id = :id");
            $checkStmt->bindParam(':id', $this->id);
            $checkStmt->execute();
    
            if ($checkStmt->fetchColumn() == 0) {
                throw new Exception("El servicio con ID " . $this->id . " no existe.");
            }
    
            // Eliminar el servicio
            $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
    
            return true;
        } catch (Exception $e) {
            // Mostrar mensaje de error
            echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
            return false;
        }
    }
    
    // Obtener todos los servicios
    public function obtenerServicios() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    
    // Obtener un servicio por ID
    public function obtenerServicioPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";

        $stmt = $this->db->prepare($query);

        // Enlazar el parámetro ID
        $stmt->bindParam(':id', $this->id);

        $stmt->execute();

        // Obtener la fila del servicio
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Asignar los valores obtenidos a las propiedades del servicio
            $this->descripcion = $row['descripcion'];
            $this->costo = $row['costo'];
        }
    }
}
?>
