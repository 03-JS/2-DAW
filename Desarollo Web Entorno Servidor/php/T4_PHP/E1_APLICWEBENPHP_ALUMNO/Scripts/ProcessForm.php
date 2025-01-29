<?php

session_start();

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';

$link = mysqli_connect($hostname, $username, $password, $database);

$aiName = $_POST["modelDisplayName"];
$model  = $_POST["currentModel"];
$prompt = $_POST["prompt"];
$user   = $_SESSION["username"];

// Insert user prompt into DB
$query = "INSERT INTO messages "
    . "(content, username, session_ID) "
    . "VALUES ($content, $user, $id)";
mysqli_query($link, $query);

// Execute Python script
$command = escapeshellcmd(escapeshellarg("../../../../../../2-DAW/.venv/Scripts/python.exe ") . "./AI.py " . escapeshellarg($model) . " " . escapeshellarg($prompt));
$output  = shell_exec($command);
$output  = mb_convert_encoding($output, 'UTF-8', mb_detect_encoding($output, 'UTF-8, ISO-8859-1', true));
$content = htmlspecialchars($output);

if ($output === "") {
    http_response_code(500); // Server error
    echo json_encode([
        'success' => false,
        'message' => 'Error executing Python script',
    ]);
    exit;
} else {
    echo json_encode([
        'success' => true,
        'output'  => $content,
        'model'   => $model,
        'prompt'  => $prompt,
    ]);
    $query = "INSERT INTO messages "
        . "(content, model, session_ID) "
        . "VALUES ($content, $aiName, $id)";
    mysqli_query($link, $query);
}

?>