<?php

class Vehiculo {
    private $db;
    public $patente;
    public $marca;
    public $modelo;
    public $dni_cliente;

    public function __construct($db) {
        $this->db = $db;
    }

    // Crear vehículo
    public function crearVehiculo() {
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

    // Método para modificar un vehículo
    public function modificarVehiculo() {
        // Query SQL para actualizar los datos del vehículo
        $query = "UPDATE vehiculos 
                  SET marca = :marca, modelo = :modelo, dni_cliente = :dni_cliente 
                  WHERE patente = :patente";

        // Preparar la consulta
        $stmt = $this->db->prepare($query);

        // Enlazar los parámetros
        $stmt->bindParam(':patente', $this->vehiculo->patente);
        $stmt->bindParam(':marca', $this->vehiculo->marca);
        $stmt->bindParam(':modelo', $this->vehiculo->modelo);
        $stmt->bindParam(':dni_cliente', $this->vehiculo->dni_cliente);

        // Ejecutar la consulta y devolver el resultado
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Listar todos los vehículos
    public function listarVehiculos() {
        $query = "SELECT * FROM vehiculos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Obtener vehículo por patente
    public function obtenerVehiculoPorPatente() {
        $query = "SELECT * FROM vehiculos WHERE patente = :patente LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    

    // Eliminar vehículo
    public function eliminarVehiculo() {
        $query = "DELETE FROM vehiculos WHERE patente = :patente";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);

        return $stmt->execute();
    }
    public function existeVehiculo() {
        $query = "SELECT * FROM vehiculos WHERE patente = :patente LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':patente', $this->patente);
        $stmt->execute();
        
        return $stmt->rowCount() > 0; // Retorna verdadero si el vehículo existe
    }
}
?>
