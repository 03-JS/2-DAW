<?php

session_start();

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';
$link     = mysqli_connect($hostname, $username, $password, $database);

$query = "SELECT password, picture_path FROM users WHERE username = '" . $_SESSION["username"] . "'";

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

echo json_encode([
    'username' => $_SESSION["username"],
    'password' => $row["password"],
    'src' => $row["picture_path"]
]);

?>