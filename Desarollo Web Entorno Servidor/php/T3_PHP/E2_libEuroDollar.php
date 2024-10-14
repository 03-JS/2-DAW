<?php

function EuroToUSD($cant)
{
    echo "Resultado de la conversión = " . $cant * 1.09 . "$";
}

function USDtoEuro($cant)
{
    echo "Resultado de la conversión = " . $cant * 0.92 . "€";
}

function Visualizar($cant)
{
    echo "Usted indicó la siguiente información:";
    echo "<br><br>";
    if ($_GET["conversion"] == "euroToUsd") {
        echo "Cantidad: " . $cant . "€";
        echo "<br><br>";
    } else {
        echo "Cantidad: " . $cant . "$";
        echo "<br><br>";
    }
}

function ErrorVacio() {
    echo "<b>Error: no hay valor</b>";
}

function ErrorNegativo() {
    echo "<b>Error: " . $_GET["num"] . " es negativo</b>";
}

?>