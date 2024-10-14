<?php

require_once "E2_libEuroDollar.php";

echo "<h2>Conversión con control de errores</h2>";
echo "<p><b>Realizamos la conversión</b></p>";

if (empty($_GET["num"])) {
    ErrorVacio();
    return;
}
if ($_GET["num"] < 0) {
    ErrorNegativo();
    return;
}

Visualizar($_GET["num"]);

if ($_GET["conversion"] == "euroToUsd") {
    EuroToUSD($_GET["num"]);
} else {
    USDtoEuro($_GET["num"]);
}
