<?php

// Datos de conexión PDO a la base de datos
$hostname = 'localhost';
$usuario = 'root';
$clave = '';
$database = 'clientesdb_dwes';
$nombreTabla = 'ARTICULO';
$cadena_conexion = "mysql:dbname=$database;host=$hostname";

try {
    $pdo = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conexión Exitosa a bd ' . $database . '<br><b>';
    echo '<h4>Drop Table</h4><br>';
    $dropTable_query = "DROP TABLE articulo";
    // Preparamos la consulta
    $stmt = $pdo->prepare($dropTable_query);
    // Ejecutamos execute sin parámetros
    if ($stmt->execute()) {
        echo "Tabla eliminada satisfactoriamente";
    } else {
        print_r($sql->errorInfo());
    }
    // Cerramos bd
    $pdo = null;
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . '<b>' . $database . '</b>' . $e->getMessage();
}

?>