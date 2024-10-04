<?php

$fecha = getdate();

echo "<b>----------------------------------</b><br>";
echo "<b>Ahora son las: " . $fecha["hours"] . " horas y " . $fecha["minutes"] . " minutos." . "</b><br>";
echo "<b>----------------------------------</b>";

?>