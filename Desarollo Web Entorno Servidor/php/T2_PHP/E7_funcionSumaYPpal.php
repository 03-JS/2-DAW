<?php

function Suma($a, $b) {
    return $a + $b;
}

echo "Asignamos valores a las variables:<br>";

$a = 10;
echo '$a = 10' . "<br>";
$b = 20;
echo '$b = 20' . "<br>";

echo "A continuación hacemos la llamada a la función";
echo "<br>";
echo "La suma de $a y $b es " . Suma($a, $b);

?>