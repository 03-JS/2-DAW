<?php

require_once 'E11_cocheHer.php';

$coche1 = new CocheHijo("Audi", "Q5", 140, 37000, "Rojo", array("Descapotable", "Enganche Bola", "Limusina"));
echo "Datos coche 1";
echo "<br>==============<br>";
echo "Marca: " . $coche1->getMarca() . "<br>";
echo "Modelo: " . $coche1->getModelo() . "<br>";
echo "Potencia: " . $coche1->getHp() . "<br>";
echo "Pvp: " . $coche1->getPvp() . "<br>";
echo "Color:<br>";
$coche1->mostrarColor();
echo "Extras:<br>";
$coche1->mostrarExtras();

echo "<br>";

$coche2 = new CocheHijo("Audi", "Q7", 240, 58000, "Azul", array("Extra 1", "Extra 2", "Extra 3"));
echo "Datos coche 2";
echo "<br>==============<br>";
echo "Marca: " . $coche2->getMarca() . "<br>";
echo "Modelo: " . $coche2->getModelo() . "<br>";
echo "Potencia: " . $coche2->getHp() . "<br>";
echo "Pvp: " . $coche2->getPvp() . "<br>";
echo "Color:<br>";
$coche2->mostrarColor();
echo "Extras:<br>";
$coche2->mostrarExtras();

?>