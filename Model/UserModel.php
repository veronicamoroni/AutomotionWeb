<?php

class Usuario {
    private $db;
    public $table = "usuarios"; 

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $contrasena;

    public function __construct($db) {
        $this->db = $db;
    }

    // Crear un nuevo usuario
    public function crearUsuario() {
        $query = "INSERT INTO " . $this->table . " (nombre, apellido, email, contrasena) 
                  VALUES (:nombre, :apellido, :email, :contrasena)";

        $stmt = $this->db->prepare($query);

        // Limpiar los datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->contraseña = htmlspecialchars(strip_tags($this->contraseña));

        // Encriptar la contraseña antes de almacenarla
        $hashed_password = password_hash($this->contraseña, PASSWORD_BCRYPT);

        // Enlazar los parámetros
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contrasena', $hashed_password);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener todos los usuarios
    public function obtenerUsuarios() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener un usuario por ID
    public function obtenerUsuarioPorId() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 0,1";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nombre = $row['nombre'];
            $this->apellido = $row['apellido'];
            $this->email = $row['email'];
        }
    }
    // Método para actualizar solo la contraseña de un usuario
public function modificarUsuario() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Asegurarse de que el ID del usuario y la nueva contraseña estén presentes
        if (isset($_POST['id']) && !empty($_POST['nueva_contrasena'])) {
            $this->usuario->id = $_POST['id'];
            $nuevaContrasena = $_POST['nueva_contrasena'];

            // Hashear la nueva contraseña
            $this->usuario->contrasena = password_hash($nuevaContrasena, PASSWORD_BCRYPT);

            // Llamar al método del modelo para actualizar la contraseña
            if ($this->usuario->actualizarContrasena()) {
                echo "Contraseña actualizada con éxito.";
            } else {
                echo "Error al actualizar la contraseña.";
            }
        } else {
            echo "Falta el ID del usuario o la nueva contraseña.";
        }
    }
}

/*    
    // Actualizar un usuario
    public function actualizarUsuario() {
        $query = "UPDATE " . $this->table . " 
                  SET nombre = :nombre, apellido = :apellido, email = :email
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->apellido = htmlspecialchars(strip_tags($this->apellido));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
*/
    // Eliminar un usuario
    public function eliminarUsuario() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    public function getTable() {
        return $this->table;
    }

}
