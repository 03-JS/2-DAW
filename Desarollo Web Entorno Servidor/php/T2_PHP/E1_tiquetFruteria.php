<?php

// Constantes
define("PRECIO_JUDIAS", 3.50);
define("PRECIO_PATATAS", 0.40);
define("PRECIO_TOMATES", 1);

// Pesos
$peso_judia = 1.21;
$peso_patata = 1.73;
$peso_tomate = 2.08;

// Precios finales
$coste_judias = PRECIO_JUDIAS * $peso_judia;
$coste_patatas = PRECIO_PATATAS * $peso_patata;
$coste_tomates = PRECIO_TOMATES * $peso_tomate;

echo "<h2>PRODUCTO  -   PRECIO (€/kg) -   PESO  -   COSTE</h2>";
echo "JUDIAS ----------------------- " . PRECIO_JUDIAS . " -------------------------- $peso_judia ---------- " . number_format($coste_judias, 2);
echo "<br>";
echo "PATATAS ---------------------- " . PRECIO_PATATAS . " -------------------------- $peso_patata ---------- " . number_format($coste_patatas, 2);
echo "<br>";
echo "TOMATES ---------------------- " . PRECIO_TOMATES . " -------------------------- $peso_tomate ---------- " . number_format($coste_tomates, 2);

?>