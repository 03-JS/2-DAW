<?php

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'clientesdb_dwes';

$link = mysqli_connect($hostname, $username, $password, $database);

if (!$link) {
    echo "Error: No se pudo conectar a MySQL" . PHP_EOL;
    echo "Error de depuración: " . mysqli_connect_errno() . "<br>";
} else {
    echo "Conexión Exitosa a bd:<br><b>" . $database . '</b><br>';
}

// Cerramos la BD
mysqli_close($link);

?>