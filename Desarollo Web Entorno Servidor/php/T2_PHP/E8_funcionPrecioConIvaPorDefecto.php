<?php

$precio = 100;

function PrecioConIVA(&$precio, $iva = 0.21) {
    echo "El precio INICIAL sin IVA es: <b>$precio</b><br>";
    $precio += $precio * $iva;
    echo "El precio con IVA es: <b>$precio</b>";
}

echo "<b>Programa Principal</b>";
echo "<br>";
echo "Invocamos a la función.";
echo "<br><br>";
PrecioConIVA($precio)
        
?>