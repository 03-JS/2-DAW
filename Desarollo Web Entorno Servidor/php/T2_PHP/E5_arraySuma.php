<?php

echo "Declara array unidimensional";
echo "<br>";
echo "<br>";

$arr = range(10, 50, 10);

echo "Recorre array";
echo "<br>";
echo "<br>";
echo "Número de elementos del array: " . count($arr);
echo "<br>";
echo "<br>";

$suma = 0;

echo "Los elementos del array son:";
echo "<br>";

foreach ($arr as $num) {
    echo $num;
    echo "<br>";
    $suma += $num;
}

echo "<br>";
echo "<b>SUMA = $suma</b>";

?>