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
    echo "indexado por NOMBRE de columna<br>";
    echo 'RECORRER FORWARD<br>';

    $select_query = "SELECT * FROM articulo";

    // Preparamos la consulta
    $stmt = $pdo->prepare($select_query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    // Ejecutar sin parámetros
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
        echo $row['idArticulo'] . '<br>';
        echo $row['Descripcion'] . '<br>';
        echo $row['Precio'] . '<br>';
        echo $row['Stock'] . '<br><br>';
        // print_r($row);
    }

    $num_filas_selected = $stmt->rowCount();
    printf("Affected rows (SELECT): %d\n", $num_filas_selected);
    echo '<br>';

} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $database . ' ' . $e->getMessage();
}
?>