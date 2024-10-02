<?php

function MediaValoresRefer($a, &$b) {
    echo "<b>Función Media Aritmética</b>";
    echo "<br>";
    echo "Número de argumentos utilizados: " . func_num_args();
    echo "<br><br>";
    echo "Valores de los argumentos utlizados:<br>";
    echo "$a y $b";
    echo "<br>";
    echo "No hace falta hacer return";
    echo "<br>";
    $b = ($a + $b) / 2;
}

echo "<b>Programa principal</b>";
echo "<br>";
echo "El valor de los parámetros lo establecemos desde él";
echo "<br>";
echo "Hacemos la llamada a la función";
echo "<br><br>";

$a = 10;
$b = 30;
MediaValoresRefer($a, $b);

echo "El resultado está en B y es $b";

?>