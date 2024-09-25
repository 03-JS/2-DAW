<?php

$nums = array(
    array(10, 20, 30),
    array(40, 50, 60),
    array(70, 80, 90)
);

echo "Declarar vector bidimensional y recorrerlo:";
echo "<br>";

for ($i = 0; $i < count($nums); $i++) {
    for ($j = 0; $j < count($nums[$i]); $j++) {
        echo $nums[$i][$j] . " ";
    }
    echo "<br>";
}

echo "<br>";

$chars = array(
    array("A", "B", "C"),
    array("D", "E", "F")
);

echo "Visualizamos con WHILE:";
echo "<br>";

$i = 0;
$j = 0;

while ($i < count($chars)) {
    while ($j < count($chars[$i])) {
        echo $chars[$i][$j] . " ";
        $j++;
    }
    echo "<br>";
    $i++;
    $j = 0;
}

?>