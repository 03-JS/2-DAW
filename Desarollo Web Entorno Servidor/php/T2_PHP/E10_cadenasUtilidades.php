<?php

$str = "Ah, free at last";

$str = str_replace(",", "", $str);
$arr = explode(" ", $str);

echo "Letras totales: " . strlen($str);
echo "<br>";
echo "Palabras totales: " . count($arr);
echo "<br>";
echo "<br>";
for ($i = 0; $i < count($arr); $i++) {
    echo "(" . $arr[$i] . ", " . strlen($arr[$i]) . ") ";
}

?>