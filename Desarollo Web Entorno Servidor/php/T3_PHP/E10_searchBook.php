<?php

// create short variable names
$searchtype = $_POST['searchtype'];
$searchterm = $_POST['searchterm'];

$searchterm = trim($searchterm); // Elimina los espacios en blanco del comienzo y del final de una cadena

if (!$searchtype || !$searchterm) {
    echo "No has introducido patrón de búsqueda.<br />";
    echo "Retrocede e intenta de nuevo.<br />";
    exit;
}

$searchtype = addslashes($searchtype);
$searchterm = addslashes($searchterm);

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bookorama';

$link = mysqli_connect($hostname, $username, $password, $database);

if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "Error de depuración: " . mysqli_connect_errno() . "<br />";
    exit;
} else {
    echo "Conexión exitosa a la bd: <b>$database</b><br /><br />";
    $query = "select * from books where $searchtype like '%$searchterm%'";
    // Selecciona todas las filas
    $result = mysqli_query($link, $query);
    $num_filas_selected = mysqli_affected_rows($link);
    printf("Número de filas recuperadas: %d\n", $num_filas_selected);

    echo "<br />";
    // Obtener todas las filas en un array asociativo
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Recorro y visualizo el array de filas
    foreach ($rows as $fila_actual) {
        print_r($fila_actual);
        echo "<br />";
    }

    // Cerramos la BD
    mysqli_close($link);
}

?>