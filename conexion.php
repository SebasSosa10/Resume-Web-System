<?php
$user = "root";
$pass = "12345";
$host = "localhost";
$db = "proyectofinal";

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);
} else {
    echo "Conexión exitosa a la base de datos";
}
?>
