<?php 

$cont = 0;

for ($i = 0; $i < 102; $i += 2) {
    echo "| $i ";
    $cont++;
    if ($cont == 17) {
        $cont = 0;
        echo "<br>";
    }
}

?>