<?php

define("RADIO", 6371);
define("DISTANCIA_AL_SOL", 149600000);
define("PI", 3.14159265359);
$vuelta = 2 * PI * RADIO;
$vueltas = DISTANCIA_AL_SOL / $vuelta;

echo "El radio de la Tierra es: <b>" . RADIO . " km</b>";
echo "<br>";
echo "La distancia de la Tierra al Sol es: <b>" . DISTANCIA_AL_SOL . "km</b>";
echo "<br>";
echo "La longitud de una vuelta al Ecuador es: <b>$vuelta km</b>";
echo "<br>";
echo "La distancia al sol equivale a <b>$vueltas vueltas</b>";

?>