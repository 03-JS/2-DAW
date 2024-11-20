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

    /* Inserta filas */
    $insert_query = "INSERT INTO articulo "
                  . "(idArticulo, Descripcion, Precio, Stock) "
                  . "VALUES (6, 'Saco Polar HJ2', 78.95, 53),"
                  . "(14, 'Linterna2', 10.5, 3)";

    echo $insert_query . '<br>';
    mysqli_query($link, $insert_query);
    printf("Affected rows (INSERT): %d\n", mysqli_affected_rows($link));
}

// cerramos la BD
mysqli_close($link);

?>