<?php

$host = "localhost";
$usuario = "root";
$password = "";
$db = "proyecto_final";

$connection = mysqli_connect($host, $usuario, $password, $db);

if ($connection) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error al conectar con la base de datos: " . mysqli_connect_error();
}
?>