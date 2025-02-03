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
    $user = $_POST["username"];
    $passwd = $_POST["passwd"];

    $query = 'SELECT * FROM Users ' .
        'WHERE username = "' . $user . '"' .
        'AND password ="' . $passwd . '"';
    $result    = mysqli_query($link, $query);
    $num_filas = mysqli_num_rows($result);
    echo json_encode([
        'query' => $query,
        'success' => $num_filas > 0,
        'status' => mysqli_errno($link)
    ]);

    if ($num_filas > 0) {
        $_SESSION["username"] = $user;
    }
}

// Cerramos conexión
mysqli_close($link);

?>