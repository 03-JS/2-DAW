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
    $passwd = $_POST["password"];

    /* Inserta filas */
    $query = "INSERT INTO users "
                  . "(username, passwd, picture_path) "
                  . "VALUES ($username, $passwd, )";
    mysqli_query($link, $query);
    echo json_encode([
        'query' => $query,
        'success' => mysqli_affected_rows($link) != -1
    ]);
}

?>