<?php

echo "<h3>Escritura datos Formulario en archivo</h3>";
echo "<b><i>Incluye control error en apertura y escritura de fichero</i></b>";
echo "<br><br><br>";
echo "Intentando volcar la información en el archivo...";
echo "<br><br>";

$file = fopen("E5_petic3.txt", "a+");

if ($file) {
    fwrite($file, date('d/m/Y') . "\t");
    fwrite($file, $_GET["nombre"] . "\t");
    fwrite($file, $_GET["apellidos"] . PHP_EOL);
    fclose($file);
    echo "<i>Se ha escrito información en el fichero</i>";
} else {
    echo "Error al abrir el archivo";
}

?>