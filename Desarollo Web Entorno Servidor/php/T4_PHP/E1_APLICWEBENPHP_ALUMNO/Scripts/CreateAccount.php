<?php

include_once "./SessionID.php";

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';

$link = mysqli_connect($hostname, $username, $password, $database);

if (!$link) {
    http_response_code(500); // Server error
    echo json_encode([
        'error' => mysqli_connect_errno(),
        'success' => false
    ]);
} else {
    $user = $_POST["username"];
    $passwd = $_POST["passwd"];
    $imagePath = "../User Media/$user/profile-pictures/$user-pfp." . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    
    // Store the users profile image in the server
    mkdir("../User Media/$user/profile-pictures");
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    // Add user
    $query = "INSERT INTO users "
                  . "(username, password, picture_path) "
                  . "VALUES ('" . $user . "', '" . $passwd . "', '" . $imagePath . "')";
    mysqli_query($link, $query);
    echo json_encode([
        'query' => $query,
        'success' => mysqli_affected_rows($link) != -1,
        'status' => mysqli_errno($link)
    ]);

    if (mysqli_affected_rows($link) != -1) {
        $_SESSION["username"] = $user;
    }
}

?>