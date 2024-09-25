<?php

$data = array(
    array(172, 165, 179, 163, 170, 174),
    array("H", "M", "H", "M", "M", "H")
);

$numHombres = 0;
$numMujeres = 0;
$sumaAltHombres = 0;
$sumaAltMujeres = 0;

for ($i = 0; $i < count($data); $i++) {
    for ($j = 0; $j < count($data[$i]); $j++) {
        if ($i == 0) {
            if ($data[$i + 1][$j] == "M") {
                $sumaAltMujeres += $data[$i][$j];
            } else if ($data[$i + 1][$j] == "H") {
                $sumaAltHombres += $data[$i][$j];
            }
        } else {
            if ($data[$i][$j] == "M") {
                $numMujeres++;
            } else if ($data[$i][$j] == "H") {
                $numHombres++;
            }
        }
    }
}

echo "Número de Hombres:";
echo "<br>";
echo $numHombres;
echo "<br>";
echo "Número de Mujeres:";
echo "<br>";
echo $numMujeres;
echo "<br>";
echo "La media de altura de los Hombres (en cm) es:</b>";
echo "<br>";
echo $sumaAltHombres / $numHombres;
echo "<br>";
echo "La media de altura de las Mujeres (en cm) es:";
echo "<br>";
echo $sumaAltMujeres / $numMujeres;

?>