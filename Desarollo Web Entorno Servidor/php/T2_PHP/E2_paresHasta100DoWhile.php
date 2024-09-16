<?php

$num = 0;
$cont = 0;

do {
    echo "| $num ";
    $cont++;
    if ($cont == 17) {
        $cont = 0;
        echo "<br>";
    }
    $num += 2;
} while ($num <= 100);

?>