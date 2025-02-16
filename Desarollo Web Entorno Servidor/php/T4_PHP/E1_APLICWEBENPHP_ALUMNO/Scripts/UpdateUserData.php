<?php

session_start();

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'chatbot_playground';
$link     = mysqli_connect($hostname, $username, $password, $database);

$oldUser = $_SESSION["username"];
$user    = $_POST["username"];

$baseImgDir  = "../User Media/$user/profile-pictures";
$imagePath   = "";

// rename("C:/Users/porta/Documents/VS Code Projects/GitHub/DAW/2-DAW/Desarollo Web Entorno Servidor/php/T4_PHP/E1_APLICWEBENPHP_ALUMNO/User Media/$oldUser", "C:/Users/porta/Documents/VS Code Projects/GitHub/DAW/2-DAW/Desarollo Web Entorno Servidor/php/T4_PHP/E1_APLICWEBENPHP_ALUMNO/User Media/$user");
rename("D:/Documentos/GitHub/Repos/DAW/2-DAW/Desarollo Web Entorno Servidor/php/T4_PHP/E1_APLICWEBENPHP_ALUMNO/User Media/$oldUser", "D:/Documentos/GitHub/Repos/DAW/2-DAW/Desarollo Web Entorno Servidor/php/T4_PHP/E1_APLICWEBENPHP_ALUMNO/User Media/$user");

if ($_FILES != null) {
    if (file_exists("$baseImgDir/" . $_FILES["image"]["name"])) {
        unlink("$baseImgDir/" . $_FILES["image"]["name"]);
    }
    $imagePath = "$baseImgDir/" . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
} else {
    $imagePath = "$baseImgDir/" . $_POST["image"];
}
$query = "UPDATE users SET username = '" . $user . "', password = '" . $_POST["password"] . "', picture_path = '" . $imagePath . "' WHERE username = '" . $oldUser . "'";

mysqli_query($link, $query);
echo json_encode([
    'success' => mysqli_affected_rows($link) > 0,
    'status'  => mysqli_errno($link)
]);

$_SESSION["username"] = $user;

?>