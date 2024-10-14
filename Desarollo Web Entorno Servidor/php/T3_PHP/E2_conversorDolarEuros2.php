<?php

if (empty($_GET["num"])) {
    echo "<b>Error: no hay valor</b>";
    return;
}
if ($_GET["num"] < 0) {
    echo "<b>Error: " . $_GET["num"] . " es negativo</b>";
    return;
}

echo "Usted indicó la siguiente información:";
echo "<br><br>";
echo "Cantidad: " . $_GET["num"] . "€";
echo "<br><br>";
echo "Resultado de la conversión = " . $_GET["num"] * 1.09 . "$";
