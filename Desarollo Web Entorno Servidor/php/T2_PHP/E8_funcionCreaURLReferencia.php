<?php

function CreaUrl($str, $str1, $str2, $str3, $str4, &$res) {
    $res = $str . $str1 . $str2 . $str3 . $str4;
}

echo "Invocando a función...";
echo "<br><br>";

$resultado;
CreaUrl("http://", "www", ".lagaceta", ".com", ".ar", $resultado);

echo "La URL completa es<br><br>";
echo "<b>$resultado</b>";

?>