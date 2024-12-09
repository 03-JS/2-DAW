<?php
$hostname = 'localhost';
$usuario = 'root';
$clave = '';
$database = 'clientesdb_dwes';
$nombreTabla = 'ARTICULO';

$cadena_conexion = "mysql:dbname=$database; host=$hostname";

try {
    $pdo = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conexión Exitosa a bd ' . $database . '<br><b>';

    echo '<h4>Select CURSOR fetch</h4><br>';
    echo "Devolver la siguiente fila como un array<br>";
    echo "indexado por número de columna<br>";
    echo 'RECORRER FORWARD<br>';

    $select_query = "SELECT * FROM articulo";
    $stmt = $pdo->prepare($select_query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        echo $row[0] . '<br>';
        echo $row[1] . '<br>';
        echo $row[2] . '<br>';
        echo $row[3] . '<br><br>';
    }
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $database . ' ' . $e->getMessage();
}
?>