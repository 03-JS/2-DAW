<?php

$sumaPar = 0;
$sumaImpar = 0;

for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        $sumaPar += $i;
    } else {
        $sumaImpar += $i;
    }
}
echo "Entre el rango 0 - 100:<br>";
echo "La suma de los <b>PARES</b> es: $sumaPar<br>";
echo "La suma de los <b>IMPARES</b> es: $sumaImpar";
?>