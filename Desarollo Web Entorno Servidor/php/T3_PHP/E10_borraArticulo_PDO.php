<?php

// Datos de conexión a la base de datos
$hostname = "localhost";
$usuario = "root";
$clave = "";
$database = "clientesdb_dwes";
$nombreTabla = "ARTICULO";

// Cadena de conexión
$cadena_conexion = "mysql:dbname=$database; host=$hostname";

try {
    // Conexión a la base de datos
    $pdo = new PDO($cadena_conexion, $usuario, $clave);
    echo "Conexión Exitosa a bd " . $database . "<br>";

    // Preparamos los parámetros
    $id = 12;

    // Consulta DELETE
    $delete_query = "DELETE FROM Articulo 
                    WHERE idArticulo = ?";

    // Preparamos la consulta
    $stmt = $pdo->prepare($delete_query);

    // Vinculamos el parámetro
    $stmt->bindParam(1, $id);

    // Ejecutamos la consulta
    $stmt->execute();

    // Contamos las filas afectadas
    $num_filas = $stmt->rowCount();
    printf("Filas afectadas (DELETE): %d\n", $num_filas);

} catch (PDOException $e) {
    echo "Error con la base de datos: " . $database . " " . $e->getMessage();
}

?>