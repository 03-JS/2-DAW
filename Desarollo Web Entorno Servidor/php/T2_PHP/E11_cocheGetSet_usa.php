<?php

require_once 'E11_cocheGetSet.php';

$coche1 = new Coche();
$coche1->setMarca("Audi");
$coche1->setModelo("Q5");
$coche1->setHp(140);
$coche1->setPvp(37000);
echo "Datos coche 1";
echo "<br>==============<br>";
echo "Marca: " . $coche1->getMarca() . "<br>";
echo "Modelo: " . $coche1->getModelo() . "<br>";
echo "Potencia: " . $coche1->getHp() . "<br>";
echo "Pvp: " . $coche1->getPvp() . "<br>";

echo "<br>";

$coche2 = new Coche();
$coche2->setMarca("Audi");
$coche2->setModelo("Q7");
$coche2->setHp(240);
$coche2->setPvp(58000);
echo "Datos coche 2";
echo "<br>==============<br>";
echo "Marca: " . $coche2->getMarca() . "<br>";
echo "Modelo: " . $coche2->getModelo() . "<br>";
echo "Potencia: " . $coche2->getHp() . "<br>";
echo "Pvp: " . $coche2->getPvp() . "<br>";

?>