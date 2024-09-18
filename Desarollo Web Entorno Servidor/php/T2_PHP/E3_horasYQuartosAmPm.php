<?php

$sufijo = "AM";

echo "<b>HORAS AM:</b>";
echo "<br>";

for ($i = 0; $i < 24; $i++) {
    $hora = $i == 0 ? $i + 12 : $i;
    if ($i >= 13) {
        $hora -= 12;
    }
    if ($i == 13) {
        echo "<br>";
        echo "<b>HORAS PM:</b>";
        echo "<br>";
        $sufijo = "PM";
    }
    for ($j = 0; $j < 60; $j += 15) {
        echo sprintf("%02u:%02u " . $sufijo, $hora, $j);
        echo "<br>";
    }
    echo "<br>";
}
?>