<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../index.html");
    exit;
}

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';
$link     = mysqli_connect($hostname, $username, $password, $database);

$date     = date("Y-m-d");
$time     = date("h-i-s");
$filename = "Conversation-$date-$time.md";
$content = "";

$query  = 'SELECT * FROM Messages WHERE session_ID=' . '"' . $_SESSION["id"] . '"';
$result = mysqli_query($link, $query);

// Recorro y visualizo el array de filas
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if (is_null($row["username"])) {
        $content .= $row["model"] . ": " . $row["content"] . PHP_EOL;
    } else {
        $content .= $row["username"] . ": " . $row["content"] . PHP_EOL . PHP_EOL;
    }
}

// Set headers to force download
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . strlen($content));

echo $content;

$folderPath = "../User Media/" . $_SESSION["username"] . "/saved-conversations";

// Save conversation file in the server
if (!file_exists($folderPath)) {
    mkdir($folderPath, 0777, true);
}

$file = fopen("$folderPath/$filename", "w");
fwrite($file, $content);
fclose($file);

// Store it in the database
$insertQuery  = "INSERT INTO Conversations (path, username) VALUES ('" . "$folderPath/$filename" . "', '" . $_SESSION["username"] . "')";
$result = mysqli_query($link, $insertQuery);

exit;

?>