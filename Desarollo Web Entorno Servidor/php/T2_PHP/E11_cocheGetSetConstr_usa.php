<?php

require_once 'E11_cocheGetSetConstr.php';

$coche1 = new Coche("Audi", "Q5", 140, 37000);
echo "Datos coche 1";
echo "<br>==============<br>";
echo "Marca: " . $coche1->getMarca() . "<br>";
echo "Modelo: " . $coche1->getModelo() . "<br>";
echo "Potencia: " . $coche1->getHp() . "<br>";
echo "Pvp: " . $coche1->getPvp() . "<br>";

echo "<br>";

$coche2 = new Coche("Audi", "Q7", 240, 58000);
echo "Datos coche 2";
echo "<br>==============<br>";
echo "Marca: " . $coche2->getMarca() . "<br>";
echo "Modelo: " . $coche2->getModelo() . "<br>";
echo "Potencia: " . $coche2->getHp() . "<br>";
echo "Pvp: " . $coche2->getPvp() . "<br>";

?>