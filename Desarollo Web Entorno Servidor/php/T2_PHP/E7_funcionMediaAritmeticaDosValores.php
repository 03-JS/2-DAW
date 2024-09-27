<?php

function MediaDosValores($a, $b) {
    echo "<b>Función media aritmética de dos valores</b>";
    echo "<br>";
    echo "Número de argumentos utilizados: " . func_num_args() . "<br>";
    echo "Valor de los argumentos utilizados:<br>";
    echo "==========================";
    echo "<br>";
    echo "Argumento 1: " . func_get_arg(0) . "<br>";
    echo "Argumento 2: " . func_get_arg(1) . "<br>";
    return ($a + $b) / 2;
}

echo "<b>Programa Principal</b>";
echo "<br>";
echo "El valor de los parámetros lo establecemos desde él<br>";
echo "Hacemos llamada a la función";
echo "<br><br>";

$media = MediaDosValores(10, 20);

echo "<br>";
echo "Ahora estoy en el programa principal";
echo "<h2>La media de dichos argumentos es: $media</h2>";
?>