<?php

require_once 'E11_coche.php';

$coche1 = new Coche("Audi", "Q5", 140, 37000);
echo "Datos coche 1";
echo "<br>==============<br>";
echo "Marca: " . $coche1->marca . "<br>";
echo "Modelo: " . $coche1->modelo . "<br>";
echo "Potencia: " . $coche1->hp . "<br>";
echo "Pvp: " . $coche1->pvp . "<br>";

echo "<br>";

$coche2 = new Coche("Audi", "Q7", 240, 58000);
echo "Datos coche 2";
echo "<br>==============<br>";
echo "Marca: " . $coche2->marca . "<br>";
echo "Modelo: " . $coche2->modelo . "<br>";
echo "Potencia: " . $coche2->hp . "<br>";
echo "Pvp: " . $coche2->pvp . "<br>";

?>