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
} else {
    echo "No se ha podido subir!";
}

?>