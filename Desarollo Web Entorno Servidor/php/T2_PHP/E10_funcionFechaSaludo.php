<?php

$fecha = getdate();

echo "<b>----------------------------------</b><br>";
echo "<b>Ahora son las: " . $fecha["hours"] . " horas y " . $fecha["minutes"] . " minutos." . "</b><br>";
echo "<b>----------------------------------</b>";
echo "<br><br>";

if ($fecha["hours"] >= 0 && $fecha["hours"] <= 11) {
    echo "Buenos días";
}
if ($fecha["hours"] >= 12 && fecha["hours"] <= 20) {
    echo "Buenas tardes";
}
if ($fecha["hours"] >= 21 && fecha["hours"] <= 23) {
    echo "Buenas noches";
}

?>