<?php

function MostrarImpares($str) {
    for ($i = 0; $i < strlen($str); $i++) {
        if ($i % 2 != 0) {
            echo $str[$i];
        }
    }
}

function MostrarPalabrasImpares($str) {
    $splitStr = explode(" ", $str);
    for ($i = 0; $i < count($splitStr); $i++) {
        if ($i % 2 != 0) {
            echo $splitStr[$i] . " ";
        }
    }
}

$str = "A quien madruga Dios le ayuda";

echo "Invocamos a MostrarImpares()<br>";
MostrarImpares($str);

echo "<br><br>";

echo "Invocamos a MostrarPalabrasImpares()<br>";
MostrarPalabrasImpares($str);

?>