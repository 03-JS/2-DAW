<?php
$hostname = 'localhost';
$usuario = 'root';
$clave = '';
$database = 'clientesdb_dwes';
$nombreTabla = 'ARTICULO';
$cadena_conexion = "mysql:dbname=$database;host=$hostname";

$pdo = new PDO($cadena_conexion, $usuario, $clave);
echo 'Conexión Exitosa a bd ' . $database . '<br><br>';
echo '<h4>Insert de múltiple filas con TRANSACCIÓN</h4><br>';
echo '<h5>Iniciamos TRANSACCIÓN....</h5>';

// Preparamos los datos en una matriz
$matDatos = [
    [20, 'articulo insert', 20, 20],
    [21, 'articulo insert', 21, 21]
];

$insert_query = "INSERT INTO Articulo "
              . "(idArticulo, Descripcion, Precio, Stock) "
              . "VALUES "
              . "(?,?,?,?)";

$stmt = $pdo->prepare($insert_query);

try {
    // Iniciamos transacción
    $pdo->beginTransaction();

    // Ejecuta cada inserción de fila
    foreach ($matDatos as $row) {
        $stmt->execute($row);
    }

    // Validamos
    $pdo->commit();
    // Cerramos bd
    $pdo = null;
} catch (PDOException $e) {
    // Rollback si hay algún problema
    $pdo->rollBack();
    echo 'Error con la base de datos: <br>' . $database . $e->getMessage();
}
?>