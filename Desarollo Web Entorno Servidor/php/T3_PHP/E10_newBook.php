<?php

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bookorama';

$link = mysqli_connect($hostname, $username, $password, $database);

if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . "<br>";
} else {
    if (empty($_POST["isbn"]) || empty($_POST["author"] || empty($_POST["title"]) || empty($_POST["price"]))) {
        echo "Has de rellenar todos los campos para introducir un libro a la base de datos";
        return;
    }

    echo $_POST["isbn"] . "<br>";

    $prepared_insert_query = "INSERT INTO books
    (isbn, author, title, price)
    VALUES (?,?,?,?)";

    $sentencia = mysqli_prepare($link, $prepared_insert_query);
    mysqli_stmt_bind_param($sentencia, "issd", $_POST["isbn"], $_POST["author"], $_POST["title"], $_POST["price"]);

    $res = mysqli_stmt_execute($sentencia);

    echo "Se ha registrado el libro correctamente";
}

// cerramos la BD
mysqli_close($link);

?>