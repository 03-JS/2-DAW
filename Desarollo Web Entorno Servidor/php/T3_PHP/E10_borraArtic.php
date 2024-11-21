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
    echo "<b>BD: " . $database . "</b><br><br>";

    // Eliminar contenido
    $idElegido = 14;
    $sql_del = "DELETE FROM articulo WHERE idArticulo = " . $idElegido;
    // Ejecutamos la sentencia sql
    $resultDelete = mysqli_query($link, $sql_del);
    $numRegistrosBorrados = mysqli_affected_rows($link);
    if ($resultDelete) {
        echo "<h3>Registros borrados: " . $numRegistrosBorrados . "</h3>";
    } else {
        echo "<h3>No se ha podido borrar artículo " . $idElegido . "</h3>";
    }
    // cerramos la BD
    mysqli_close($link);
}

?>