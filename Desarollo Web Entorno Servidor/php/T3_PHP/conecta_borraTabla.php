<?php

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'clientesdb_dwes';

$link = mysqli_connect($hostname, $username, $password, $database);

if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . "<br>";
} else {
    echo "Conexión exitosa!<br>";
    echo "<b>BD: " . $database . "</b><br>";

    // Eliminar tabla
    $drop_table_query = "DROP TABLE articulo";

    //ejecutamos la sentencia sql
    $result = mysqli_query($link, $drop_table_query);

    if ($result) {
        echo "Tabla borrada";
    } else {
        echo "No se ha podido Borrar la tabla";
    }
    // cerramos la BD
    mysqli_close($link);
}

?>