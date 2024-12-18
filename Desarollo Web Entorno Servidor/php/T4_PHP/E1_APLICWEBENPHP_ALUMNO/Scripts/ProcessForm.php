<?php

// $model = escapeshellarg($_POST["currentModel"]);
// $prompt = escapeshellarg($_POST["prompt"]);
$model = escapeshellarg("HuggingFaceH4/starchat2-15b-v0.1");
$prompt = escapeshellarg("Haz un programa en php que imprima por pantalla Hola Mundo");

$output = shell_exec(escapeshellcmd("python ./Scripts/AI.py " . escapeshellarg($model) . " " . escapeshellarg($prompt)));

if ($output === null) {
    http_response_code(500); // Server error
    echo json_encode(['success' => false, 'message' => 'Error executing Python script']);
} else {
    echo json_encode(['success' => true, 'output' => $output]);
}

?>