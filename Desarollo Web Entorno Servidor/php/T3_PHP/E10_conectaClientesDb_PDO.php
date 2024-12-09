<?php
// Datos de conexión PDO a la base de datos
$hostname = 'localhost';
$usuario = 'root';
$clave = '';
$database = 'clientesdb_dwes';
$port = 3306;
$nombreTabla = 'ARTICULO';

// $cadena_conexion = "mysql:dbname=$database;host=$hostname";
$cadena_conexion = "mysql:"
    . "host=$hostname;"
    . "dbname=$database;"
    . "port=$port;";

try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conexión Exitosa a bd ' . '<b>' . $database . '</b>' . '<br><br>';
    // Cerrar la conexión
    $bd = null;
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . '<b>' . $database . '</b>' . $e->getMessage();
}
?>