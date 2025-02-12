<?php

class Vehiculo {
    private $db;
    public $patente;
    public $marca;
    public $modelo;
    public $dni_cliente;
    public $table = "vehiculos"; 

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function crearVehiculo() {
        // Verificar si la patente ya existe en la base de datos
        $query = "SELECT COUNT(*) FROM vehiculos WHERE patente = :patente";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);
        $stmt->execute();
        
        // Si la patente ya existe, devolver un mensaje
        if ($stmt->fetchColumn() > 0) {
            return "Error: La patente ya está registrada.";
        }
    
        // Si la patente no existe, proceder con la inserción
        $query = "INSERT INTO vehiculos (patente, marca, modelo, dni_cliente) 
                  VALUES (:patente, :marca, :modelo, :dni_cliente)";
        $stmt = $this->db->prepare($query);
    
        // Limpiar los datos antes de insertarlos
        $this->patente = htmlspecialchars(strip_tags($this->patente));
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->dni_cliente = htmlspecialchars(strip_tags($this->dni_cliente));
    
        // Enlace de parámetros
        $stmt->bindParam(':patente', $this->patente);
        $stmt->bindParam(':marca', $this->marca);
        $stmt->bindParam(':modelo', $this->modelo);
        $stmt->bindParam(':dni_cliente', $this->dni_cliente);
    
        // Ejecutar la inserción y devolver el resultado
        return $stmt->execute() ? true : "Error: No se pudo crear el vehículo.";
    }
    

    // Método para modificar un vehículo
    public function modificarVehiculo() {
        try {
            // Verificar si el vehículo con la patente original existe
            $stmtVerificar = $this->db->prepare("SELECT 1 FROM vehiculos WHERE patente = :patente");
            $stmtVerificar->bindParam(':patente', $this->patente);
            $stmtVerificar->execute();
    
            // Si no se encuentra el vehículo, retornar un error
            if ($stmtVerificar->rowCount() == 0) {
                return "El vehículo con la patente " . $this->patente . " no existe.";
            }
    
            // Proceder con la actualización
            $stmt = $this->db->prepare("UPDATE vehiculos 
                SET patente = :nueva_patente, marca = :marca, modelo = :modelo, dni_cliente = :dni_cliente 
                WHERE patente = :patente");
    
            // Limpiar y enlazar los parámetros
            $stmt->bindParam(':patente', $this->patente);
            $stmt->bindParam(':nueva_patente', $this->nueva_patente);
            $stmt->bindParam(':marca', $this->marca);
            $stmt->bindParam(':modelo', $this->modelo);
            $stmt->bindParam(':dni_cliente', $this->dni_cliente);
    
            // Ejecutar la consulta y retornar el resultado
            return $stmt->execute() ? true : "Error: No se pudo modificar el vehículo.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }


    // Eliminar vehículo
    public function eliminarVehiculo() {
        // Comprobamos si el vehículo con la patente existe
        $query = "DELETE FROM vehiculos WHERE patente = :patente AND EXISTS (SELECT 1 FROM vehiculos WHERE patente = :patente)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);
    
        // Ejecutar la consulta y retornar el resultado de la ejecución
        return $stmt->execute();
    }
    

    public function obtenerVehiculoPorPatente() {
        $query = "SELECT * FROM " . $this->table . " WHERE patente = :patente LIMIT 0,1";
    
        $stmt = $this->db->prepare($query);
    
        // Enlazar el parámetro patente
        $stmt->bindParam(':patente', $this->patente);
    
        $stmt->execute();
    
        // Obtener la fila del vehículo
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            // Asignar los valores obtenidos a las propiedades del vehículo
            $this->marca = $row['marca'];
            $this->modelo = $row['modelo'];
            $this->dni_cliente = $row['dni_cliente'];
        }
    }
    
    public function obtenerVehiculos() {
        $query = "SELECT * FROM " . $this->table; // Asegúrate de que $this->table sea la tabla de vehículos
    
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        return $stmt;
    }
    
}
?>
