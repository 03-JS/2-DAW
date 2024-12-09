<?php

$hostname = 'localhost';
$usuario = 'root';
$clave = '';
$database = 'clientesdb_dwes';
$nombreTabla = 'ARTICULO';
$cadena_conexion = "mysql:dbname=$database;host=$hostname";

try {
    $pdo = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conexión Exitosa a bd ' . $database . '<br><b>';
    echo '<h4>Select con parámetros nominales</h4><br>';

    // Preparamos los parámetros
    $id = 1;
    $select_query = "SELECT * FROM articulo"
                  . " WHERE idArticulo=:id";
    
    // Preparamos la consulta
    $stmt = $pdo->prepare($select_query);
    $stmt->execute(['id' => $id]);
    $num_filas_selected = $stmt->rowCount();
    printf("Affected rows (SELECT): %d\n", $num_filas_selected);
    echo '<br>';
    
    $data = $stmt->fetchAll();
    foreach ($data as $row) {
        echo $row['idArticulo'] . "<br />\n";
        echo $row['Descripcion'] . "<br />\n";
        echo $row['Precio'] . "<br />\n";
        echo $row['Stock'] . "<br />\n";
    }
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $database . ' ' . $e->getMessage();
}

?>