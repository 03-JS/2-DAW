<?php

if (!is_uploaded_file($_FILES["userfile"]["tmp_name"])) {
    echo "Error en la carga del fichero";
    echo "<br>";
    echo $_FILES["userfile"]["error"];
    return;
}

if (!file_exists(__DIR__ . "../../UPLOADS/doc")) {
    echo "No existe el directorio doc, lo creamos";
    echo "<br>";
    mkdir(__DIR__ . "../../UPLOADS/doc", 0777, true);
}

if (move_uploaded_file($_FILES["userfile"]["tmp_name"], __DIR__ . "../../UPLOADS/doc/up_" . $_FILES["userfile"]["name"])) {
    echo "Nombre temporal: " . $_FILES["userfile"]["tmp_name"];
    echo "<br>";
    echo "Nombre final: " . $_FILES["userfile"]["name"];
    echo "<br>";
} else {
    echo "No se ha podido subir!";
}

if (!empty($_POST["userfile"]) || $_POST["descripcion"] == "") {
    echo "Ninguno de los 2 campos pueden estar vacíos!";
    return;
}

if (!file_exists(__DIR__ . "../../UPLOADS/dsc")) {
    echo "No existe el directorio dsc, lo creamos";
    echo "<br>";
    mkdir(__DIR__ . "../../UPLOADS/dsc", 0777, true);
}

$file = fopen(__DIR__ . "../../UPLOADS/dsc/descripciones.dsc", "a+");
fwrite($file, date('d/m/Y H:i') . "\t" . $_POST["descripcion"] . "\n");
fclose($file);

echo "Archivo añadido con exito al directorio dsc";

?>