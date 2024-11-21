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
    // Selecciona todas las filas
    $select_query = "SELECT * FROM articulo";

    $result = mysqli_query($link, $select_query);

    $num_filas_selected = mysqli_affected_rows($link);

    printf("Affected rows (SELECT): %d\n", $num_filas_selected);

    echo '<br>';

    // Obtener todas las filas en un array asociativo
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Recorro y visualizo el array de filas
    foreach ($rows as $fila_actual) {
        print_r($fila_actual);
        echo '<br>';
    }
    // cerramos la BD
    mysqli_close($link);
}

?>