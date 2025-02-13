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
        $result = $stmt->fetchColumn();
    
        // Si la patente ya existe, devolver un error
        if ($result > 0) {
            return "Error: La patente ya está registrada.";
        }
    
        // Si la patente no existe, proceder con la inserción
        $query = "INSERT INTO vehiculos (patente, marca, modelo, dni_cliente) VALUES (:patente, :marca, :modelo, :dni_cliente)";
        $stmt = $this->db->prepare($query);
    
        // Enlace de parámetros
        $stmt->bindParam(':patente', $this->patente);
        $stmt->bindParam(':marca', $this->marca);
        $stmt->bindParam(':modelo', $this->modelo);
        $stmt->bindParam(':dni_cliente', $this->dni_cliente);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return "Error: No se pudo crear el vehículo.";
        }
    }

    public function modificarVehiculo() {
        try {
            // Verificar si el vehículo con la patente original existe
            $queryVerificar = "SELECT COUNT(*) FROM vehiculos WHERE patente = :patente";
            $stmtVerificar = $this->db->prepare($queryVerificar);
            $stmtVerificar->bindParam(':patente', $this->patente);
            $stmtVerificar->execute();
            $result = $stmtVerificar->fetchColumn();
    
            if ($result == 0) {
                return false; // Vehículo no encontrado
            }
    
            // Actualizar el vehículo
            $query = "UPDATE vehiculos 
                    SET patente = :nueva_patente, marca = :marca, modelo = :modelo, dni_cliente = :dni_cliente 
                    WHERE patente = :patente";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':patente', $this->patente);
            $stmt->bindParam(':nueva_patente', $this->nueva_patente);
            $stmt->bindParam(':marca', $this->marca);
            $stmt->bindParam(':modelo', $this->modelo);
            $stmt->bindParam(':dni_cliente', $this->dni_cliente);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            // Si hay un error de clave foránea, mostrar un mensaje personalizado
            if ($e->getCode() == '23503') { // Código de error de clave foránea en PostgreSQL
                echo "No se puede modificar la patente porque está asociada a turnos existentes.";
                return false;
            } else {
                echo "Error al modificar el vehículo: " . $e->getMessage();
                return false;
            }
        }
    }
    


    // Eliminar vehículo
    public function eliminarVehiculo() {
        // Verificar si el vehículo con la patente existe
        $queryVerificar = "SELECT COUNT(*) FROM vehiculos WHERE patente = :patente";
        $stmtVerificar = $this->db->prepare($queryVerificar);
        $stmtVerificar->bindParam(':patente', $this->patente);
        $stmtVerificar->execute();
        $result = $stmtVerificar->fetchColumn();
    
        // Si no se encuentra el vehículo con la patente, retornar false
        if ($result == 0) {
            return false; // Vehículo no encontrado
        }
    
        // Si el vehículo existe, proceder con la eliminación
        $query = "DELETE FROM vehiculos WHERE patente = :patente";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);
    
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
