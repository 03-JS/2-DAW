<?php

$personas = array(
    "Luís" => "López",
    "Ana" => "García",
    "Sergio" => "Pérez",
    "Héctor" => "Sánchez",
    "Adrián" => "Sala"
);

$nombres = array_keys($personas);

for ($i = 0; $i < count($nombres); $i++) {
    echo $i + 1 . "- $nombres[$i] " . $personas[$nombres[$i]];
    echo "<br>";
}

?>