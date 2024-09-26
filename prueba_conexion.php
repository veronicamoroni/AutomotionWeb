<?php
require_once('C:\xampp\htdocs\automotionweb\configs\conexion.php');
require_once('C:\xampp\htdocs\automotionweb\Model\Model.php'); 
$model = new Model();

try {
$db = $model->getDb();
echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
 echo "Error al conectar a la base de datos: " . $e->getMessage();
}echo realpath('../configs/conexion.php');

?>

