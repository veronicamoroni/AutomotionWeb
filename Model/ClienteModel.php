<?php
    require_once('C:\xampp\htdocs\automotion\frontend\modelos\model.php');
    


    class Cliente {
        private $db;
        public $table = "clientes"; // Asegúrate de usar el nombre correcto de la tabla en minúsculas.
    
        public $dni;
        public $nombre;
        public $apellido;
        public $telefono;
        public $email;
    
        public function __construct($db) {
            $this->db = $db;
        }
    
        // Crear un nuevo cliente
        public function altaCliente() {
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
            if ($stmt->execute()) {
                return true;
            }
    
            return false;
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
        public function actualizarCliente() {
            $query = "UPDATE " . $this->table . " 
                      SET nombre = :nombre, apellido = :apellido, telefono = :telefono, email = :email
                      WHERE dni = :dni";
    
            $stmt = $this->db->prepare($query);
    
            // Limpiar los datos
            $this->nombre = htmlspecialchars(strip_tags($this->nombre));
            $this->apellido = htmlspecialchars(strip_tags($this->apellido));
            $this->telefono = htmlspecialchars(strip_tags($this->telefono));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->dni = htmlspecialchars(strip_tags($this->dni));
    
            // Enlazar los parámetros
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellido', $this->apellido);
            $stmt->bindParam(':telefono', $this->telefono);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':dni', $this->dni);
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true;
            }
    
            return false;
        }
    
        // Eliminar un cliente
        public function eliminarCliente() {
            $query = "DELETE FROM " . $this->table . " WHERE dni = :dni";
    
            $stmt = $this->db->prepare($query);
    
            $this->dni = htmlspecialchars(strip_tags($this->dni));
    
            $stmt->bindParam(':dni', $this->dni);
    
            if ($stmt->execute()) {
                return true;
            }
    
            return false;
        }
    
        public function getTable() {
            return $this->table;
        }
    }
    