<?php
include_once('C:\xampp\htdocs\AutomotionWeb\Model\UserModel.php');


class UsuarioController {
    private $db;
    private $usuario;

    public function __construct($db) {
        $this->db = $db;
        $this->usuario = new Usuario($db);
    }

    // Método para registrar un nuevo usuario
    public function registrarse() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar que los campos existan en el POST antes de asignarlos
            $this->usuario->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $this->usuario->apellido = isset($_POST['apellido']) ? $_POST['apellido'] : ''; // Asumiendo que también necesitas el apellido
            $this->usuario->email = isset($_POST['email']) ? $_POST['email'] : '';
            $this->usuario->contraseña = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

            // Verifica que todos los campos requeridos tengan valores
            if (!empty($this->usuario->nombre) && !empty($this->usuario->apellido) && !empty($this->usuario->email) && !empty($this->usuario->contraseña)) {
                if ($this->usuario->crearUsuario()) {
                   
                    echo "Usuario registrado con éxito.";
                } else {
                    echo "Error al registrar el usuario.";
                }
            } else {
                echo "Por favor, rellena todos los campos obligatorios.";
            }
        }
    }
    public function iniciarSesion() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
   
            if (!empty($email) && !empty($contrasena)) {
                $query = "SELECT * FROM " . $this->usuario->table . " WHERE email = :email LIMIT 1";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($user && password_verify($contrasena, $user['contrasena'])) {
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['nombre'] = $user['nombre'];
                    header("Location: menu.tpl");
                    exit();
                } else {
                    echo "Correo electrónico o contraseña incorrectos.";
                }
            } else {
                echo "Por favor, rellena todos los campos obligatorios.";
            }
        }
    } // Faltaba este corchete
   
    // Método para obtener todos los usuarios
    public function obtenerUsuarios() {
        $stmt = $this->usuario->obtenerUsuarios();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($usuarios);
    }

    // Método para eliminar un usuario
    public function eliminarUsuario($id) {
        $this->usuario->id = $id;

        if ($this->usuario->eliminarUsuario()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar el usuario.";
        }
    }

    // Método para actualizar un usuario
    public function actualizarUsuario() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Asegurarse de que el ID del usuario esté presente
            if (isset($_POST['id'])) {
                $this->usuario->id = $_POST['id'];
                $this->usuario->nombre = $_POST['nombre'];
                $this->usuario->apellido = $_POST['apellido']; // Asegúrate de que el apellido esté también
                $this->usuario->email = $_POST['email'];
                
                // Actualizar la contraseña si se ha proporcionado una nueva
                if (!empty($_POST['contraseña'])) {
                    $this->usuario->contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
                }

                // Llamar al método actualizar del modelo
                if ($this->usuario->actualizarUsuario()) {
                    echo "Usuario actualizado con éxito.";
                } else {
                    echo "Error al actualizar el usuario.";
                }
            } else {
                echo "Falta el ID del usuario.";
            }
        }
    }
}
