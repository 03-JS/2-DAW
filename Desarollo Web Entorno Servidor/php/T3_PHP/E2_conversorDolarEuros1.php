<?php

echo "<h2>Conversión con control de errores</h2>";
echo "<p><b>Realizamos la conversión a US Dollars</b></p>";
echo "Usted indicó la siguiente información:";
echo "<br><br>";
echo "Cantidad: " . $_GET["num"] . "€";
echo "<br><br>";
echo "Resultado de la conversión = " . $_GET["num"] * 1.09 . "$";

?>