<?php

$model = $_POST["currentModel"];
$prompt = $_POST["prompt"];

$command = escapeshellcmd(escapeshellarg("../../../../../../2-DAW/.venv/Scripts/python.exe ") . "./AI.py " . escapeshellarg($model) . " " . escapeshellarg($prompt));
$output = shell_exec($command);
$output = mb_convert_encoding($output, 'UTF-8', mb_detect_encoding($output, 'UTF-8, ISO-8859-1', true));

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
        'output' => htmlspecialchars($output),
        'model' => $model,
        'prompt' => $prompt
    ]);
}

?>