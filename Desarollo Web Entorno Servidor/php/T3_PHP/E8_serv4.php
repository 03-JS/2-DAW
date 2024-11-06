<p><b>Controla que el tipo de fichero a subir: PDF o POSTSCRIPT</b></p>

<?php

if (!is_uploaded_file($_FILES["userfile"]["tmp_name"])) {
    echo "Error en la carga del fichero";
    echo "<br>";
    echo $_FILES["userfile"]["error"];
    return;
}

if (explode("/", $_FILES["userfile"]["type"])[1] != "pdf" && explode("/", $_FILES["userfile"]["type"])[1] != "postscript") {
    echo "El archivo ha de ser de tipo PDF o PS";
    return;
}

if (move_uploaded_file($_FILES["userfile"]["tmp_name"], __DIR__ . "../../UPLOADS/up_" . $_FILES["userfile"]["name"])) {
    echo "Nombre temporal: " . $_FILES["userfile"]["tmp_name"];
    echo "<br>";
    echo "Nombre final: " . $_FILES["userfile"]["name"];
} else {
    echo "No se ha podido subir!";
}

?>