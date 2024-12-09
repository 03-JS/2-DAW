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
    echo 'Conexión Exitosa a bd ' . $database . '<br><br>';
    echo '<h4>Insert con parámetros posicionales</h4><br>';

    // Preparamos los parámetros
    $id = 12;
    $desc = 'articulo insert';
    $prec = 12;
    $stoc = 12;

    $insert_query = "INSERT INTO Articulo "
                  . "(idArticulo, Descripcion, Precio, Stock) "
                  . "VALUES "
                  . "(?,?,?,?)";

    // echo $insert_query.'<br>';
    // Preparamos la consulta
    $stmt = $pdo->prepare($insert_query);

    // Hacemos Bind de cada parámetro con su valor
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $desc);
    $stmt->bindParam(3, $prec);
    $stmt->bindParam(4, $stoc);

    // Ejecutamos execute sin parámetros
    $stmt->execute();

    $num_filas = $stmt->rowCount();
    printf("Affected rows (INSERT): %d\n", $num_filas);
    echo '<br>';

    // Cerramos bd
    $pdo = null;
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $database . ' ' . $e->getMessage();
}
?>