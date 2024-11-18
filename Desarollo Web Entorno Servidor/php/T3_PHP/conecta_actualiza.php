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

    /* Actualiza filas */
    $update_query = "UPDATE articulo SET "
                  . "Descripcion = 'Chaleco_modif' WHERE idArticulo = 1";

    echo $update_query . '<br>';
    $result = mysqli_query($link, $update_query);
    $num_filas = mysqli_affected_rows($link);
    printf("Affected rows (UPDATE): %d\n", $num_filas);
}

// cerramos la BD
mysqli_close($link);

?>