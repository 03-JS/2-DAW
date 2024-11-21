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
    // OTRA FORMA de recorrer y visualizar el array de filas
    /* Selecciona todas las filas */

    $select_query = "SELECT * FROM articulo";
    $result = mysqli_query($link, $select_query);
    echo "<br>";
    $num_filas_selected = mysqli_affected_rows($link);
    printf("Affected rows (SELECT): %d\n", $num_filas_selected);

    echo '<br>';

    while ($fila_actual = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo $fila_actual['idArticulo'] . '<br>';
        echo $fila_actual['Descripcion'] . '<br>';
        echo $fila_actual['Precio'] . '<br>';
        echo $fila_actual['Stock'] . '<br>' . '<br>';
    }
    // cerramos la BD
    mysqli_close($link);
}

?>