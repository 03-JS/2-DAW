<?php

for ($i = 0; $i < 24; $i++) {
    // $art = $i == 1 ? "la $i" : "las $i";
    // echo "Fracciones de " . $art . ":<br>";
    for ($j = 0; $j < 60; $j += 15) {
        echo sprintf("%02u:%02u", $i, $j);
        echo "<br>";
    }
    // echo "<br>";
}
?>