<?php

// Datos de conexión a la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'clientesdb_dwes';

$link = mysqli_connect($hostname, $username, $password, $database);

if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . "<br>";
} else {
    echo "Conexión exitosa!<br>";
    echo "<b>BD: " . $database . "</b><br>";
    /* CONSULTA preparada: una sentencia INSERT */
    $prepared_insert_query = "INSERT INTO articulo
    (idArticulo, Descripcion, Precio, Stock)
    VALUES (?,?,?,?)";

    echo $prepared_insert_query . '<br>';

    $sentencia = mysqli_prepare($link, $prepared_insert_query);
    mysqli_stmt_bind_param($sentencia, "isid", $val1, $val2, $val3, $val4);

    $val1 = 13; // idArticulo tipo integer (i)
    $val2 = 'Articulo13'; // Descripcion tipo String (s)
    $val3 = 133.0; // Precio tipo double(d)
    $val4 = 13; // stock tipo integer (i)

    /* Ejecutar la sentencia */
    $res = mysqli_stmt_execute($sentencia);

    $numRegistrosInsertados = mysqli_affected_rows($link);

    echo 'Registros insertados: ' . $numRegistrosInsertados;
    // cerramos la BD
    mysqli_close($link);
}

?>