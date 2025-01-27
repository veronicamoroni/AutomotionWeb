<?php
class Cliente {
    private $db;
    public $table = "clientes"; 
    public $dni;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;

    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo cliente
    public function crearCliente() {
        try {
            // Preparar la consulta
            $query = "INSERT INTO " . $this->table . " (dni, nombre, apellido, telefono, email) 
                      VALUES (:dni, :nombre, :apellido, :telefono, :email)";
            $stmt = $this->db->prepare($query);
    
            // Limpiar los datos
            $this->dni = htmlspecialchars(strip_tags($this->dni));
            $this->nombre = htmlspecialchars(strip_tags($this->nombre));
            $this->apellido = htmlspecialchars(strip_tags($this->apellido));
            $this->telefono = htmlspecialchars(strip_tags($this->telefono));
            $this->email = htmlspecialchars(strip_tags($this->email));
    
            // Enlazar los parámetros
            $stmt->bindParam(':dni', $this->dni);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellido', $this->apellido);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':email', $this->email);
    
            // Ejecutar la consulta
            return $stmt->execute();
        } catch (PDOException $e) {
            // Manejar error de llave duplicada (dni ya existente)
            if ($e->getCode() == '23505') {  // Código de violación de unicidad
                return "El cliente con DNI " . $this->dni . " ya existe.";
            } else {
                return "Error al crear el cliente: " . $e->getMessage();
            }
        }
    }
         // Actualizar un cliente
    public function modificarCliente() {
        $query = "UPDATE " . $this->table . " 
                  SET telefono = :telefono, email = :email 
                  WHERE dni = :dni";
    
        $stmt = $this->db->prepare($query);
    
        // Limpiar los datos
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->dni = htmlspecialchars(strip_tags($this->dni)); // Asegúrate de que el DNI también está definido
    
        // Enlazar los parámetros
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':dni', $this->dni); 
        
        return $stmt->execute();
    }
    
    // Eliminar un cliente
    public function eliminarCliente() {
        try {
            // Comprobamos si el DNI existe en la tabla clientes
            $checkStmt = $this->db->prepare("SELECT COUNT(*) FROM " . $this->table . " WHERE dni = :dni");
            $checkStmt->bindParam(':dni', $this->dni);
            $checkStmt->execute();
    
            if ($checkStmt->fetchColumn() == 0) {
                throw new Exception("El cliente con DNI " . $this->dni . " no existe.");
            }
    
            // Comprobamos si existen vehículos asociados
            $vehiculosStmt = $this->db->prepare("SELECT COUNT(*) FROM vehiculos WHERE dni_cliente = :dni");
            $vehiculosStmt->bindParam(':dni', $this->dni);
            $vehiculosStmt->execute();
    
            if ($vehiculosStmt->fetchColumn() > 0) {
                throw new Exception("El cliente no se puede eliminar porque tiene vehículos asociados.");
            }
    
            // Eliminar cliente
            $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE dni = :dni");
            $stmt->bindParam(':dni', $this->dni);
            $stmt->execute();
    
            return true;
        } catch (Exception $e) {
            // Mostrar mensaje de error
            echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
            return false;
        }
    }
    
    
  // Obtener todos los clientes
  public function obtenerClientes() {
    $query = "SELECT * FROM " . $this->table;

    $stmt = $this->db->prepare($query);
    $stmt->execute();

    return $stmt;
}

// Obtener un cliente por DNI
public function obtenerClientePorDni() {
    $query = "SELECT * FROM " . $this->table . " WHERE dni = :dni LIMIT 0,1";

    $stmt = $this->db->prepare($query);

    // Enlazar el parámetro DNI
    $stmt->bindParam(':dni', $this->dni);

    $stmt->execute();

    // Obtener la fila del cliente
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Asignar los valores obtenidos a las propiedades del cliente
        $this->nombre = $row['nombre'];
        $this->apellido = $row['apellido'];
        $this->telefono = $row['telefono'];
        $this->email = $row['email'];
    }
}

}
?>
