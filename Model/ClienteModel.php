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
        // Verificar si el cliente con el DNI ya existe
        $queryCheck = "SELECT COUNT(*) FROM " . $this->table . " WHERE dni = :dni";
        $stmtCheck = $this->db->prepare($queryCheck);
        $stmtCheck->bindParam(':dni', $this->dni);
        $stmtCheck->execute();
        
        // Si ya existe el cliente con el mismo DNI, retornar falso
        if ($stmtCheck->fetchColumn() > 0) {
            return "El cliente con el DNI " . $this->dni . " ya existe.";
        }
    
        // Preparar la consulta para insertar el nuevo cliente
        $query = "INSERT INTO " . $this->table . " (dni, nombre, apellido, telefono, email) 
                  VALUES (:dni, :nombre, :apellido, :telefono, :email)";
        $stmt = $this->db->prepare($query);
    
        // Enlazar los parámetros
        $stmt->bindParam(':dni', $this->dni);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':email', $this->email);
    
        // Ejecutar la consulta y retornar el resultado
        if ($stmt->execute()) {
            return true; // Cliente creado exitosamente
        } else {
            return "Error al crear el cliente.";
        }
    }
    
     
    public function modificarCliente() {
        // Verificar si el cliente con el DNI proporcionado existe
        $queryVerificar = "SELECT COUNT(*) FROM " . $this->table . " WHERE dni = :dni";
        $stmtVerificar = $this->db->prepare($queryVerificar);
        $stmtVerificar->bindParam(':dni', $this->dni);
        $stmtVerificar->execute();
        $result = $stmtVerificar->fetchColumn();
    
        // Si no se encuentra el cliente con el DNI proporcionado, retornar false
        if ($result == 0) {
            return "El cliente con el DNI " . $this->dni . " no existe.";
        }
    
        // Preparar la consulta para modificar el cliente
        $queryModificar = "UPDATE " . $this->table . " 
                           SET telefono = :telefono, email = :email 
                           WHERE dni = :dni";
        $stmtModificar = $this->db->prepare($queryModificar);
    
        // Limpiar los datos para evitar inyecciones SQL
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->dni = htmlspecialchars(strip_tags($this->dni));
    
        // Enlazar los parámetros
        $stmtModificar->bindParam(':telefono', $this->telefono);
        $stmtModificar->bindParam(':email', $this->email);
        $stmtModificar->bindParam(':dni', $this->dni);
    
        // Ejecutar la consulta y devolver el resultado
        if ($stmtModificar->execute()) {
            return true; // Actualización exitosa
        } else {
            return "Error al modificar los datos del cliente.";
        }
    }
    
    
    // Eliminar un cliente
    public function eliminarCliente() {
        try {
            // Comprobamos si el DNI existe en la tabla clientes
            $checkStmt = $this->db->prepare("SELECT COUNT(*) FROM " . $this->table . " WHERE dni = :dni");
            $checkStmt->bindParam(':dni', $this->dni);
            $checkStmt->execute();
        
            // Si el cliente no existe, lanzamos una excepción
            if ($checkStmt->fetchColumn() == 0) {
                throw new Exception("El cliente con DNI " . $this->dni . " no existe.");
            }
        
            // Comprobamos si existen vehículos asociados
            $vehiculosStmt = $this->db->prepare("SELECT COUNT(*) FROM vehiculos WHERE dni_cliente = :dni");
            $vehiculosStmt->bindParam(':dni', $this->dni);
            $vehiculosStmt->execute();
        
            // Si existen vehículos asociados, no podemos eliminar al cliente
            if ($vehiculosStmt->fetchColumn() > 0) {
                throw new Exception("El cliente no se puede eliminar porque tiene vehículos asociados.");
            }
        
            // Eliminar cliente
            $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE dni = :dni");
            $stmt->bindParam(':dni', $this->dni);
            $stmt->execute();
        
            return true; // Cliente eliminado correctamente
        } catch (Exception $e) {
            // Retornamos el mensaje de error
            return $e->getMessage();
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
