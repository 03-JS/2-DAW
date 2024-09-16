<?php

$frenos = 2;
$aceite = 3;
$ruedas = 1;

define("PRECIO_FRENOS", 100);
define("PRECIO_ACEITE", 10);
define("PRECIO_RUEDAS", 4);

$total = ($frenos * PRECIO_FRENOS) + ($aceite * PRECIO_ACEITE) + ($ruedas * PRECIO_RUEDAS);

$noComprado = "No comprados: ";

echo "Frenos: $frenos<br>";
echo "Aceite: $aceite<br>";
echo "Ruedas: $ruedas<br>";
echo "PRECIOS";
echo "<br>";
echo "Frenos: " . PRECIO_FRENOS . "€<br>";
echo "Aceite: " . PRECIO_ACEITE . "€<br>";
echo "Ruedas: " . PRECIO_RUEDAS . "€<br>";
echo "<br>";

if ($frenos == 0 || $aceite == 0 || $ruedas == 0) {
    if ($frenos == 0) {
        $noComprado .= "frenos";
        if ($aceite == 0 || $ruedas == 0) {
            $noComprado .= ", ";
        }
    }
    if ($aceite == 0) {
        $noComprado .= $ruedas == 0 ? "aceite, " : "aceite";
    }
    if ($ruedas == 0) {
        $noComprado .= "ruedas";
    }
    echo $noComprado . "<br>";
    echo "<h3>La petición ha de contener todos los tipos de artículo!</h3>";
} else {
    echo "Su petición es la siguiente:<br>";
    echo "Frenos: $frenos<br>";
    echo "Aceite: $aceite<br>";
    echo "Ruedas: $ruedas<br>";
    echo "<br>";
    echo "<b>Número de elementos solicitados: " . $frenos + $aceite + $ruedas . "<br></b>";
    echo "<b>Subtotal: " . $total . "€<br></b>";
    echo "<b>Total con el IVA: " . $total * 0.21 . "€<br></b>"; // 21% IVA
}
?>