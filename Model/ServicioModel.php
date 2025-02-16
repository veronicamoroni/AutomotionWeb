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
        $queryVerificar = "SELECT COUNT(*) FROM servicios WHERE id = :id";
        $stmtVerificar = $this->db->prepare($queryVerificar);
        $stmtVerificar->bindParam(':id', $this->id);
        $stmtVerificar->execute();
        $result = $stmtVerificar->fetchColumn();
    
        // Si no se encuentra el servicio con el ID proporcionado, retornar false
        if ($result == 0) {
            return false; // Servicio no encontrado
        }
    
        // Si el servicio existe, proceder con la actualización
        $query = "UPDATE servicios 
                SET descripcion = :descripcion, costo = :costo
                WHERE id = :id";
    
        // Preparar la consulta
        $stmt = $this->db->prepare($query);
    
        // Limpiar los datos (por si acaso no se han limpiado en el setter del modelo)
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->costo = htmlspecialchars(strip_tags($this->costo));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        // Enlazar los parámetros
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':costo', $this->costo);
    
        // Ejecutar la consulta y devolver el resultado
        return $stmt->execute();
    }
    
    
    public function eliminarServicio() {
        try {
            // Verificar si el servicio con el ID existe
            $queryVerificar = "SELECT COUNT(*) FROM servicios WHERE id = :id";
            $stmtVerificar = $this->db->prepare($queryVerificar);
            $stmtVerificar->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmtVerificar->execute();
            
            if ($stmtVerificar->fetchColumn() == 0) {
                return "El servicio con ID " . $this->id . " no existe.";
            }
            
            // Intentar eliminar el servicio
            $query = "DELETE FROM servicios WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                // Verificar si realmente se eliminó algo
                if ($stmt->rowCount() > 0) {
                    return "Servicio eliminado con éxito.";
                } else {
                    return "No se pudo eliminar el servicio. Puede que ya haya sido eliminado.";
                }
            } else {
                return "Error: No se pudo eliminar el servicio.";
            }
    
        } catch (PDOException $e) {
            if ($e->getCode() == '23503') { 
                return "No se puede eliminar el servicio porque está vinculado a otra tabla.";
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
