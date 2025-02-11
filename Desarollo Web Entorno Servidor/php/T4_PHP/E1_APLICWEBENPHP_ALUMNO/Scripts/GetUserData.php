<?php

session_start();

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';
$link     = mysqli_connect($hostname, $username, $password, $database);

$query = "SELECT password, picture_path FROM users WHERE username = '" . $_SESSION["username"] . "'";
$res   = mysqli_query($link, $query);
$row   = mysqli_fetch_array($res, MYSQLI_ASSOC);

$conversationsQuery = "SELECT path FROM conversations WHERE username = '" . $_SESSION["username"] . "'";
$result             = mysqli_query($link, $conversationsQuery);

echo json_encode([
    'username' => $_SESSION["username"],
    'password' => $row["password"],
    'src'      => $row["picture_path"],
    'rows'     => mysqli_fetch_all($result, MYSQLI_ASSOC),
]);

?>