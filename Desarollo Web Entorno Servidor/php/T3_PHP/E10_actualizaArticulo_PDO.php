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

    // Consulta de actualización con parámetros posicionales
    $update_query = "UPDATE Articulo
                    SET descripcion=?, precio=?, stock=?
                    WHERE idArticulo=?";

    // Preparamos los parámetros
    $desc = "articulo modificado";
    $prec = 10;
    $stoc = 100;
    $id = 20;

    // Preparamos la consulta
    $stmt = $pdo->prepare($update_query);

    // Hacemos bind de cada parámetro con su valor
    $stmt->bindParam(1, $desc);
    $stmt->bindParam(2, $prec);
    $stmt->bindParam(3, $stoc);
    $stmt->bindParam(4, $id);

    // Ejecutamos la consulta
    $stmt->execute();

    // Obtenemos el número de filas afectadas
    $num_filas = $stmt->rowCount();
    printf("Affected rows (UPDATE): %d\n", $num_filas);

} catch (PDOException $e) {
    echo "Error con la base de datos: " . $database . " " . $e->getMessage();
}

?>