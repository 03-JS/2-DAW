<?php

echo "Usted indicó la siguiente información:";
echo "<br><br>";
echo "Cantidad: " . $_GET["num"] . "€";
echo "<br><br>";
echo "Resultado de la conversión = " . $_GET["num"] * 1.09 . "$";

?>