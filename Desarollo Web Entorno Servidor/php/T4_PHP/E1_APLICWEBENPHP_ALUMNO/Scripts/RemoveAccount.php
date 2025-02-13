<?php

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';
$link     = mysqli_connect($hostname, $username, $password, $database);

$query = "DELETE FROM users WHERE username = '" . $_SESSION["username"] . "'";
mysqli_query($link, $query);

echo json_encode([
    'success' => mysqli_affected_rows($link) > 0,
    'status'  => mysqli_errno($link)
]);

if (mysqli_affected_rows($link) > 0) {
    system('rmdir ' . escapeshellarg("../User Media/" . $_SESSION["username"]) . ' /s /q');
}

?>