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
    
            // Si no se encuentra el vehículo, retornar mensaje
            if ($result == 0) {
                return "El vehículo con la patente especificada no existe.";
            }
    
            // Intentar actualizar el vehículo
            $query = "UPDATE vehiculos 
                      SET patente = :nueva_patente, marca = :marca, modelo = :modelo, dni_cliente = :dni_cliente 
                      WHERE patente = :patente";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':patente', $this->patente);
            $stmt->bindParam(':nueva_patente', $this->nueva_patente);
            $stmt->bindParam(':marca', $this->marca);
            $stmt->bindParam(':modelo', $this->modelo);
            $stmt->bindParam(':dni_cliente', $this->dni_cliente);
    
            $stmt->execute();
    
            // Verificar si se actualizó al menos una fila
            if ($stmt->rowCount() > 0) {
                return "Vehículo modificado correctamente.";
            } else {
                return "No se realizaron cambios en el vehículo.";
            }
        } catch (PDOException $e) {
            // Si ocurre un error por clave foránea (turnos asociados), devolver mensaje específico
            if ($e->getCode() == "23503" || $e->getCode() == "1451") { 
                return "No se puede modificar el vehículo, tiene turnos asociados.";
            }
            return "Error en la base de datos: " . $e->getMessage();
        }
    }
    
    
// Eliminar vehículo
public function eliminarVehiculo() {
    try {
        // Verificar si el vehículo con la patente existe
        $queryVerificar = "SELECT COUNT(*) FROM vehiculos WHERE patente = :patente";
        $stmtVerificar = $this->db->prepare($queryVerificar);
        $stmtVerificar->bindParam(':patente', $this->patente);
        $stmtVerificar->execute();
        $result = $stmtVerificar->fetchColumn();

        // Si no se encuentra el vehículo con la patente, retornar false
        if ($result == 0) {
            return "El vehículo con la patente proporcionada no existe.";
        }

        // Si el vehículo existe, proceder con la eliminación
        $query = "DELETE FROM vehiculos WHERE patente = :patente";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);
        
        if ($stmt->execute()) {
            return "Vehículo eliminado con éxito.";
        }

    } catch (PDOException $e) {
        // Si la excepción indica una violación de clave foránea
        if ($e->getCode() == '23503') { 
            return "No se puede eliminar el vehículo porque tiene turnos asociados.";
        }
        return "Error al eliminar el vehículo: " . $e->getMessage();
    }
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
