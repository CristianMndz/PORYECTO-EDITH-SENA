<?php  
$servername = "localhost";
$database = "sis_inventario";
$username = "root";
$password = "";
// Crear CONEXION
$conn = mysqli_connect($servername, $username, $password, $database, 3306);
// Revisar CONEXION
if (!$conn) {
    die("ERROR DE CONEXIÓN: " . mysqli_connect_error());
}
echo "Conexión exitosa";
?>