<?php

session_start();

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';
$link     = mysqli_connect($hostname, $username, $password, $database);

$date     = date("Y/m/d");
$time     = date("h:i:s");
$filename = "Conversation-$date-$time.txt";
$content = "";

$query  = 'SELECT content FROM messages WHERE session_ID=' . '"' . $_SESSION["id"] . '"';
$result = mysqli_query($link, $query);

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Recorro y visualizo el array de filas
foreach ($rows as $current_row) {
    $content .= $current_row;
}

// Set headers to force download
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . strlen($content));

echo $content;
exit;

?>