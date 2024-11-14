<?php

//Aleja
/* $user = "root";
$pass = "12345";
$host = "localhost";
$db = "proyectofinal"; */

//Sosa
$user = "root";
$pass = "123456";
$host = "localhost";
$db = "hoja-de-vida";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}
?>
