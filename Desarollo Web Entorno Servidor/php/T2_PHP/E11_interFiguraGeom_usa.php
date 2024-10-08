<?php

require_once 'E11_cuadrado.php';
require_once 'E11_pentagono.php';
require_once 'E11_hexagono.php';

$cuadrado = new Cuadrado(5);
$penta = new Pentagono(5, 4);
$hexa = new Hexagono(5, 4);

echo "ÁREA del cuadrado: " . $cuadrado->calcularArea();
echo "<br>";
echo "PERÍMETRO del cuadrado: " . $cuadrado->calcularPerimetro();
echo "<br>";
echo "<br>";

echo "ÁREA del pentágono: " . $penta->calcularArea();
echo "<br>";
echo "PERÍMETRO del pentágono: " . $penta->calcularPerimetro();
echo "<br>";
echo "<br>";

echo "ÁREA del hexágono: " . $hexa->calcularArea();
echo "<br>";
echo "PERÍMETRO del hexágono: " . $hexa->calcularPerimetro();
echo "<br>";

?>