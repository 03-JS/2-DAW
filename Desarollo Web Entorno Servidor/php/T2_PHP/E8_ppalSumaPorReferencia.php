<?php

function Suma($a, $b, &$resultado) {
    $resultado = $a + $b;
}

$a = 10;
$b = 20;
$resultado;

echo "Asignamos valores a las variables:<br>";
echo '$a = ' . $a;
echo "<br>";
echo '$b = ' . $b;
echo "<br><br>";
echo "Llamada a la función <b>Suma(a, b, resultado)</b>";
echo "<br>";
echo "El resultado se obtiene en el parámetro resultado, pasado por referencia";
echo "<br>";
Suma($a, $b, $resultado);
echo "La suma de $a y $b es $resultado"

?>