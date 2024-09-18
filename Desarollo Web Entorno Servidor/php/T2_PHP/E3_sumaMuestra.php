<?php

$suma = 0;

for ($i = 100; $i <= 200; $i++) {
    echo "$i<br>";
    $suma += $i;
}

echo "<br>";
echo "La suma de los números es: <b>$suma</b>";
?>