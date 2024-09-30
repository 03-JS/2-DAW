<?php

$iva = 0.21;
$precio = 100;

function PrecioConIVA($iva, &$precio) {
    echo "El precio INICIAL sin IVA es: <b>$precio</b><br>";
    $precio += $precio * $iva;
    echo "El precio con IVA es: <b>$precio</b>";
}

echo "<b>Programa Principal</b>";
echo "<br>";
echo "El valor del IVA lo establecemos desde él.";
echo "<br>";
echo "El valor del IVA es: $iva";
echo "<br>";
echo "Invocamos a la función.";
echo "<br><br>";
$precio = PrecioConIVA($iva, $precio)
        
?>