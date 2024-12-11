<style>
    table, th, td {
        text-align: center;
        border: 1px solid black;
        width: 25%
    }
</style>

<?php

$hostname = 'localhost';
$user_bd = 'root';
$pass_bd = '';
$database = 'notasdb_dwes';
$link = mysqli_connect($hostname, $user_bd, $pass_bd, $database);

$userid = $_POST["user"];
$password = $_POST["passwd"];
$type = $_POST["type"];

if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "Error de depuración: " . mysqli_connect_errno() . "<br>";
} else {
    echo "Conexión exitosa a la base de datos<br>";
    echo "<b>BD: NOTASDB_DWES</b><br><br>";
    echo "Veamos si el usuario existe...<br><br>";
    $query = 'SELECT * FROM USUARIOS ' .
    'WHERE USER = "' . $userid . '"' .
    'AND PASS = "' . $password . '"' .
    'AND TIPO = "' . $type . '"';
    $result = mysqli_query($link, $query);
    $num_filas = mysqli_num_rows($result);
    echo "Cerramos la conexión<br>";
    mysqli_close($link);
    if ($num_filas > 0) {
        echo "Usuario $userid conectado<br><br>";
        fcargaNotasPriBDaMat($MATPRIM);
        fVisualizaDatosMATPRI($MATPRIM);
        fEscribeDatosMATPRIaARCH("notasPrimero.txt", $MATPRIM);
        fcargaNotasSegBDaMat($MATNOTASSEG_BD);
        fEscribeMediasaBD($MEDIAS, "MEDIAS");
        fEscribeMediasaArchivo($MEDIAS);
        fvisualizaMediasDeArch("NOTASCICLO.dat");
    }
}

function fcargaNotasPriBDaMat(&$matriz) {
    echo "<b>Carga datos de BD - tabla NOTASPRIM</b><br><br>";

    $hostname = 'localhost';
    $user_bd = 'root';
    $pass_bd = '';
    $database = 'notasdb_dwes';
    $link = mysqli_connect($hostname, $user_bd, $pass_bd, $database);

    $select_query = "SELECT * FROM NOTASPRIM";
    $result = mysqli_query($link, $select_query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $matriz = $rows;

    echo "Cerramos la conexión<br><br>";
    mysqli_close($link);
}

function fVisualizaDatosMATPRI($matriz) {
    echo "<b>Visualiza datos de MATRIZ - tabla NOTASPRIM...</b><br><br>";
    
    echo "<table>";
    echo "<tr>";
    echo "<td><b>Alumno</b></td>";
    echo "<td><b>Media 1º</b></td>";
    echo "<td><b>Fecha Aprob.</b></td>";
    echo "</tr>";
    for ($i=0; $i < count($matriz); $i++) { 
        echo "<tr>";
        echo "<td>" . $matriz[$i]["NomAlum"] . "</td>";
        echo "<td>" . $matriz[$i]["MediaPrim"] . "</td>";
        echo "<td>" . $matriz[$i]["FechAprobado"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function fEscribeDatosMATPRIaARCH($fileName, $matriz) {
    echo "<h2>Escribe datos de Matriz en Archivo $fileName...</h2>";

    $file = fopen($fileName, "w");
    fwrite($file, "Alumno\tMedia 1º\tFecha Aprob.\n");
    for ($i=0; $i < count($matriz); $i++) { 
        fwrite($file, $matriz[$i]["NomAlum"] . "\t");
        fwrite($file, $matriz[$i]["MediaPrim"] . "\t");
        fwrite($file, $matriz[$i]["FechAprobado"]);
        fwrite($file, "\n");
    }
    fclose($file);
}

function fcargaNotasSegBDaMat(&$matriz) {
    echo "<b>Lee de BD datos de Segundo y los pasa a MATRIZ...</b><br><br>";

    $hostname = 'localhost';
    $user_bd = 'root';
    $pass_bd = '';
    $database = 'notasdb_dwes';
    $link = mysqli_connect($hostname, $user_bd, $pass_bd, $database);

    $select_query = "SELECT * FROM NOTASSEG";
    $result = mysqli_query($link, $select_query);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $matriz = $rows;

    echo "Creamos la cabecera de la tabla<br>";
    echo "VISUALIZAMOS los datos de la tabla NOTASSEG pasados a MATNOTASSEG_BD<br>";
    echo "<table>";
    echo "<tr>";
    echo "<td><b>Alumno</b></td>";
    echo "<td><b>Asignatura</b></td>";
    echo "<td><b>Nota</b></td>";
    echo "</tr>";
    for ($i=0; $i < count($matriz); $i++) { 
        echo "<tr>";
        echo "<td>" . $matriz[$i]["NomAlum"] . "</td>";
        echo "<td>" . $matriz[$i]["NomAsig"] . "</td>";
        echo "<td>" . $matriz[$i]["NotaAsig"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "Cerramos la conexión<br><br>";
    mysqli_close($link);
}

function fEscribeMediasaBD(&$matriz, $table) {
    echo "<b>Escribe Matriz MEDIAS en tabla MEDIAS de la BD...</b><br><br>";

    $hostname = 'localhost';
    $user_bd = 'root';
    $pass_bd = '';
    $database = 'notasdb_dwes';
    $link = mysqli_connect($hostname, $user_bd, $pass_bd, $database);

    $matriz = array(
        array("NomAlum" => "PILAR", "MediaPri" => 9, "MediaSeg" => 7, "MediaCiclo" => 7.3),
        array("NomAlum" => "HUGO", "MediaPri" => 8, "MediaSeg" => 7.4, "MediaCiclo" => 7.5),
        array("NomAlum" => "JESÚS", "MediaPri" => 7, "MediaSeg" => 6.2, "MediaCiclo" => 6.3),
        array("NomAlum" => "RICARDO", "MediaPri" => 6, "MediaSeg" => 5.8, "MediaCiclo" => 5.8),
        array("NomAlum" => "ARTURO", "MediaPri" => 5, "MediaSeg" => 8, "MediaCiclo" => 7.6),
        array("NomAlum" => "MELISSA", "MediaPri" => 5, "MediaSeg" => 6.8, "MediaCiclo" => 6.5)
    );
    echo "Realizando la inserción...<br><br>";
    for ($i=0; $i < count($matriz); $i++) {
        $insert_query = "INSERT INTO " . $table . " "
        . "(NomAlum, MediaPri, MediaSeg, MediaCiclo) "
        . "VALUES ('" . $matriz[$i]["NomAlum"] . "', " . $matriz[$i]["MediaPri"] . ", " . $matriz[$i]["MediaSeg"] . ", "  . $matriz[$i]["MediaCiclo"] . ")";
        mysqli_query($link, $insert_query);
    }

    echo "Cerramos la conexión<br><br>";
    mysqli_close($link);
}

function fEscribeMediasaArchivo($matriz) {
    echo "<b>Escribe Matriz MEDIAS en el archivo NOTASCICLO.dat...</b><br><br>";

    $file = fopen("NOTASCICLO.dat", "w");
    fwrite($file, "Alumno\tMedia 1º\tMedia 2º\tMedia Ciclo\n");
    for ($i=0; $i < count($matriz); $i++) { 
        fwrite($file, $matriz[$i]["NomAlum"] . "\t");
        fwrite($file, $matriz[$i]["MediaPri"] . "\t");
        fwrite($file, $matriz[$i]["MediaSeg"] . "\t");
        fwrite($file, $matriz[$i]["MediaCiclo"]);
        fwrite($file, "\n");
    }
    fclose($file);
}

function fvisualizaMediasDeArch($fileName) {
    echo "<b>Visualiza contenido de archivo $fileName...</b><br><br>";

    $file = fopen($fileName, "r");
    while (!feof($file)) {
        echo fgets($file) . "<br />";
    }
    fclose($file);
}

?>