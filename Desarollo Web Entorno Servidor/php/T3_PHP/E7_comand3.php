<style>
    table, th, td {
        border: 1px solid black;
        width: 25%
    }
</style>

<h2>Ficheros disponibles en el directorio doc</h2>
<h2>Sólo muestra los de tipo .pdf y .ps</h2>
<p><b>Vista previa de los ficheros del directorio doc</b></p>
<h3>Ahora lo mostramos en forma de tabla</h3>

<table>
<tr>
    <td>Fichero</td>
    <td>Tamaño</td>
</tr>
<?php

$dir = opendir("./doc");

$input = readdir($dir);
while ($input != false) {
    echo "<tr>";
    $str = explode(".", basename($input))[1];
    if ($str == "pdf" || $str == "ps") {
        echo "<td>" . basename($input) . "</td><br>";
        echo "<td>" . filesize("./doc/" . $input) . "</td><br>";
    }
    $input = readdir($dir);
    echo "</tr>";
}

?>

</table>