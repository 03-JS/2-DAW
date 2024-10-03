<?php

include("E9_libreriaMediaAritmetica.php");

echo "Invocamos a las funciones:";
echo "<br><br>";
echo MediaValores(10, 20, 30);
echo "<br><br>";
echo MediaArray(array(10, 20, 30, 40, 50));
echo "<br><br>";
$b = 20;
MediaValoresRefer(5, $b);
echo "<br>";
echo $b;
        
?>