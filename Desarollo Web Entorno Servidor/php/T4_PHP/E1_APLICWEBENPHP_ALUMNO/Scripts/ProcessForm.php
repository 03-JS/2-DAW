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
$temp = $_POST["temperature"];
$maxTokens = $_POST["maxTokens"];
$topP = $_POST["topP"];
$freqPenalty = $_POST["freqPenalty"];
// $presPenalty = $_POST["presPenalty"];
$apiKey = $_POST["apiKey"];
$user   = $_SESSION["username"];

// Insert user message into DB
$query = "INSERT INTO Messages (content, username, session_ID) VALUES ('" . $prompt . "', '" . $user . "', '" . $_SESSION["id"] . "')";
mysqli_query($link, $query);

// Execute Python script
$command = escapeshellcmd(escapeshellarg("../../../../../../2-DAW/.venv/Scripts/python.exe ") . "./AI.py " . escapeshellarg($model) . " " . escapeshellarg($prompt) . " $temp $maxTokens $topP $freqPenalty " . escapeshellarg($apiKey));
// $command = escapeshellcmd(escapeshellarg("../../../../../../2-DAW/.venv/Scripts/python.exe ") . "./AI.py " . escapeshellarg($model) . " " . escapeshellarg($prompt) . " $temp $maxTokens $topP $freqPenalty $presPenalty " . escapeshellarg($apiKey));
$output  = shell_exec($command);
$output  = mb_convert_encoding($output, 'UTF-8', mb_detect_encoding($output, 'UTF-8, ISO-8859-1', true));
$content = htmlspecialchars($output);

if ($output === "") {
    http_response_code(500); // Server error
    echo json_encode([
        'success' => false,
        'message' => 'Error executing Python script'
    ]);
    exit;
} else {
    echo json_encode([
        'success' => true,
        'output'  => $content,
        'model'   => $model,
        'prompt'  => $prompt
    ]);
}

$query = "INSERT INTO Messages (content, model, username, session_ID) VALUES ('" . mysqli_escape_string($link, $output) . "', '" . $aiName . "', '" . $_SESSION["username"] . "', '" . $_SESSION["id"] . "')";
mysqli_query($link, $query);

?>