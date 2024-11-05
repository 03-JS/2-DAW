<p><b>Controla que el tamaño del archivo no supera los 100kb</b></p>

<?php

echo $_FILES["userfile"]["size"];
echo "<br>";

if (!is_uploaded_file($_FILES["userfile"]["tmp_name"])) {
    echo "Error en la carga del fichero";
    echo "<br>";
    echo $_FILES["userfile"]["error"];
    return;
}

if ($_FILES["userfile"]["type"] != "pdf" || $_FILES["userfile"]["type"] != "ps") {
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