<?php

// include_once "./SessionID.php";

session_start();

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';

$link = mysqli_connect($hostname, $username, $password, $database);

if (! $link) {
    http_response_code(500); // Server error
    echo json_encode([
        'error'   => mysqli_connect_errno(),
        'success' => false,
    ]);
} else if ($_FILES != null && $_POST["username"] != "" && $_POST["passwd"] != "") {
    $user      = $_POST["username"];
    $passwd    = $_POST["passwd"];
    $baseDir   = "../User Media/$user/profile-pictures";
    $imagePath = "$baseDir/" . $_FILES["image"]["name"];

    // Store the users profile image in the server
    if (! file_exists($baseDir)) {
        mkdir($baseDir, 0777, true);
    }

    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    // Add user
    $query = "INSERT INTO users "
        . "(username, password, picture_path) "
        . "VALUES ('" . $user . "', '" . $passwd . "', '" . $imagePath . "')";
    mysqli_query($link, $query);

    echo json_encode([
        'success' => mysqli_affected_rows($link) != -1,
    ]);

    if (mysqli_affected_rows($link) != -1) {
        $_SESSION["username"] = $user;
    }
} else {
    http_response_code(500); // Server error
    echo json_encode([
        'success' => false,
    ]);
}

?>