<p><b>Ejercicio</b></p>
<p><b>Ficheros disponibles en el directorio doc. Sólo muestra los de tipo .pdf y .ps</b></p>
<p><b>Vista previa de los ficheros del directorio doc</b></p>

<?php

$dir = opendir("./doc");

$input = readdir($dir);
while ($input != false) {
    $str = explode(".", basename($input))[1];
    if ($str == "pdf" || $str == "ps") {
        echo basename($input) . "<br>";
    }
    $input = readdir($dir);
}

?>