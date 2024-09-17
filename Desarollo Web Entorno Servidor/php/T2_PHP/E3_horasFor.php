<?php

$hora = 0;
$minuto = 0;

echo "Fracciones de las 0:00:<br>";

for ($i = 0; $i < 288; $i++) {
    if ($minuto == 60) {
        $hora++;
        $minuto = 0;
        $art = $hora == 1 ? "la $hora" : "las $hora";
        echo "<br>Fracciones de " . $art . ":<br>";
    }
    echo sprintf("%02u:%02u", $hora, $minuto);
    echo "<br>";
    $minuto += 5;
}
?>