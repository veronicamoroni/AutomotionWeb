<?php
    require_once('C:\xampp\htdocs\automotion\frontend\modelos\model.php');
    
    class ClienteModel extends Model {

        function todos() {
        
            $sql = 'SELECT * FROM cliente ORDER BY id';
            
            $stmt = $this->getDb()->query($sql);
            
            $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $clientes;
        }
        
        function un($dni) {
            
            $sql = 'SELECT * FROM cliente WHERE dni = ?';
            
            $stmt = $this->getDb()->prepare($sql);
            $stmt->execute([$dni]);
            
            $cliente = $stmt->fetch(PDO::FETCH_OBJ);
            return $cliente;
        }
        
        function eliminar($id) {
            $sql = 'DELETE FROM cliente WHERE dni = ?';
            $statement = $this->getDb()->prepare($sql);
            $statement->execute([$dni]);
        } 
        
        
        function cliente_insertar($datos) {
            
            $nombre = $datos['nombre'];
            $apellido = $datos['apellido'];
            $email = $datos['email'];
            $telefono = $datos['telefono'];
            $direccion = $datos['direccion'];
        
            $sql = 'INSERT INTO cliente (nombre, apellido, email, telefono, direccion) 
                    VALUES (?, ?, ?, ?, ?)';
        
            $statement = $this->getDb()->prepare($sql);
            $statement->execute([$nombre, $apellido, $email, $telefono, $direccion]);
        }           
    }