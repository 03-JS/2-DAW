<?php

$suma = 0;
$cont = 0;

for ($i = 1; $i <= 100; $i++) {
    echo "$i";
    $suma += $i;
    $cont++;
    if ($cont == 15) {
        $cont = 0;
        echo "<br>";
    } else if ($i < 100) { echo "-"; }
}

echo "<br><br>";
echo "La suma de los números entre 1 y 100 es: <b>$suma</b>";
?>