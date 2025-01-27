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
    $insert_query = "INSERT INTO users "
                  . "(username, passwd, picture_path) "
                  . "VALUES ($username, $passwd, )";

    echo $insert_query . '<br>';
    mysqli_query($link, $insert_query);
    printf("Affected rows (INSERT): %d\n", mysqli_affected_rows($link));
}

?>