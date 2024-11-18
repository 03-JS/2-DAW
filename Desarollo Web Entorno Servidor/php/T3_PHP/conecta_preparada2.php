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

    /* otra forma de CONSULTA PREPARADA: crear una sentencia preparada */
    if ($stmt = mysqli_prepare($link, "SELECT idArticulo FROM Articulo WHERE Descripcion = ?")) {
        // buscamos un producto a partir de su descripción
        $descrip = 'Mochila M28';

        /* ligar parámetros para marcadores */
        mysqli_stmt_bind_param($stmt, "s", $descrip);

        /* ejecutar la consulta */
        mysqli_stmt_execute($stmt);

        /* ligar variables de resultado */
        mysqli_stmt_bind_result($stmt, $idArt);

        /* obtener valor */
        mysqli_stmt_fetch($stmt);

        // mostramos el idarticulo asociado a la descripción
        printf("%s es el idArticulo del producto %s\n", $idArt, $descrip);

        /* cerrar sentencia */
        mysqli_stmt_close($stmt);
    }

    // cerramos la BD
    mysqli_close($link);
}

?>