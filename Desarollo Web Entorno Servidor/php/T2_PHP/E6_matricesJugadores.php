<?php

$jugadores = array(
    array("Benzema", "Mo Salah", "Mbappé"),
    array("Messi", "Ronaldo", "Lewandoski"),
    array("De Bruyne", "Joaquin", "Casillas")
);

echo "Declarar vector bidimensional y recorrerlo:";
echo "<br>";
echo "<br>";

for ($i = 0; $i < count($jugadores); $i++) {
    for ($j = 0; $j < count($jugadores[$i]); $j++) {
        echo $jugadores[$i][$j];
        echo "<br>";
        echo "Fila $i - Col $j";
        echo "<br>";
    }
    echo "<br>";
}
?>