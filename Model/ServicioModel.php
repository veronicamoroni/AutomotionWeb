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

    
    public function crearServicio() {
        // Verificar si ya existe el servicio con la misma descripción (nombre)
        $queryCheck = "SELECT COUNT(*) FROM " . $this->table . " WHERE descripcion = :descripcion";
        $stmtCheck = $this->db->prepare($queryCheck);
        $stmtCheck->bindParam(':descripcion', $this->descripcion);
        $stmtCheck->execute();
        
        // Si ya existe un servicio con la misma descripción, retornar el mensaje
        $count = $stmtCheck->fetchColumn();
        if ($count > 0) {
            return false;  // Indicamos que el servicio no puede ser creado
        }
    
        // Si no existe, proceder con la inserción
        $query = "INSERT INTO " . $this->table . " (descripcion, costo) VALUES (:descripcion, :costo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':descripcion', $this->descripcion);
    
        if (isset($this->costo)) {
            $stmt->bindParam(':costo', $this->costo);
        } else {
            $stmt->bindValue(':costo', null, PDO::PARAM_NULL);
        }
    
        // Ejecutar la inserción y retornar el resultado
        if ($stmt->execute()) {
            return true;  // Servicio creado exitosamente
        } else {
            return false;  // Error al guardar el servicio
        }
    }
    
    
    
    // Modificar un servicio
    public function modificarServicio() {
        // Limpiar los datos (por si acaso no se han limpiado en el setter del modelo)
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->costo = htmlspecialchars(strip_tags($this->costo));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        // Proceder con la actualización
        $query = "UPDATE servicios 
                  SET descripcion = :descripcion, costo = :costo
                  WHERE id = :id";
        
        // Preparar la consulta
        $stmt = $this->db->prepare($query);
        
        // Enlazar los parámetros
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':costo', $this->costo);
        
        // Ejecutar la consulta y devolver el resultado
        return $stmt->execute();
    }
    
    
    public function eliminarServicio() {
        try {
            // Intentamos eliminar el servicio directamente
            $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
    
            // Verificamos si alguna fila fue afectada
            if ($stmt->rowCount() == 0) {
                return "El servicio no existe.";
            }
    
            return true; // Servicio eliminado exitosamente
        } catch (PDOException $e) {
            // Manejo de errores de clave foránea
            if ($e->getCode() == '23503') {
                return "No se puede eliminar el servicio porque tiene dependencias asociadas.";
            }
            return "Error al eliminar el servicio: " . $e->getMessage();
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
