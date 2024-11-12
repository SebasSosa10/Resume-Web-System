<?php
$user = "root";
$pass = "12345";
$host = "localhost";
$db = "proyectofinal";

// Cambiar $con a $conn para consistencia
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa"; // Esto es solo para verificar, elimínalo después de la prueba
}
?>
