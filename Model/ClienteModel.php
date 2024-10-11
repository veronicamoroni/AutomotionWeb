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
                    $query = "INSERT INTO clientes (dni, nombre, apellido, telefono, email) 
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
      
    
    
    // Obtener todos los clientes
public function obtenerClientes() {
    $query = "SELECT * FROM " . $this->table; // Consulta para obtener todos los clientes

    $stmt = $this->db->prepare($query);
    $stmt->execute();

    return $stmt;
}

        // Obtener un cliente por DNI
        public function obtenerClientePorDni() {
            $query = "SELECT * FROM " . $this->table . " WHERE dni = :dni LIMIT 0,1";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':dni', $this->dni);
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                $this->nombre = $row['nombre'];
                $this->apellido = $row['apellido'];
                $this->telefono = $row['telefono'];
                $this->email = $row['email'];
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
            $stmt->bindParam(':dni', $this->dni); // Enlaza el DNI
        
            return $stmt->execute();
        }
        
        // Eliminar un cliente
        public function eliminarCliente() {
            $query = "DELETE FROM " . $this->table . " WHERE dni = :dni";
    
            $stmt = $this->db->prepare($query);
            $this->dni = htmlspecialchars(strip_tags($this->dni));
    
            $stmt->bindParam(':dni', $this->dni);
    
            return $stmt->execute();
        }
        
    }
           