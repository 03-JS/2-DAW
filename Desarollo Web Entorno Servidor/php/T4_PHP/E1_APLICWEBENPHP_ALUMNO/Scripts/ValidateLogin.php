<?php

include_once "./SessionID.php";

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';

$link = mysqli_connect($hostname, $username, $password, $database);

if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo mysqli_connect_errno() . PHP_EOL;
} else {
    $username = $_POST["username"];
    $passwd = $_POST["passwd"];

    $query = 'select * from usuarios ' .
        'where username = "' . $username . '"' .
        'and passwd ="' . $passwd . '"';
    $result    = mysqli_query($link, $query);
    $num_filas = mysqli_num_rows($result);
    echo json_encode([
        'query' => $query,
        'success' => $num_filas > 0
    ]);
}

// Cerramos conexión
mysqli_close($link);

?>