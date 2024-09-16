<?php

$suma = 0;
$aprobados = 0;

for ($i = 0; $i < 5; $i++) {
    $rn = rand(0, 10);
    if ($rn >= 5) { $aprobados++; }
    echo $rn . "<br>";
    $suma += $rn;
}

echo "<br>";
echo "<b>El número de alumos aprobados es: $aprobados</b>";
?>