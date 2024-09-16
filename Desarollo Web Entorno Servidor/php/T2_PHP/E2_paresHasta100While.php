<?php

$num = 0;
$cont = 0;

while ($num <= 100) {
    echo "| $num ";
    $cont++;
    if ($cont == 17) {
        $cont = 0;
        echo "<br>";
    }
    $num += 2;
}

?>