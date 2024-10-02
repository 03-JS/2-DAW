<?php

function CreaEmail($str, $str1, $str2, &$res) {
    $res = $str . $str1 . $str2;
}

echo "Invocando la función...";
echo "<br><br>";

$resultado;
$ext = "com";
CreaEmail("nombreApellido", "@gmail", "." . $ext, $resultado);

if ($ext != "com" && $ext != "es") {
    echo "Extensión incorrecta: <b>$ext</b>";
    return;
}

echo "Email completo es<br><br>";
echo "<b>$resultado</b>";

?>