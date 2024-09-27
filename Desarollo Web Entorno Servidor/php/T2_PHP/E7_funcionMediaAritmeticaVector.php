<?php

function MediaArray($arr) {
    $suma = 0;
    echo "<b>Función media aritmética con array</b>";
    echo "<br>";
    echo "Número de elementos del array recibidos: " . count($arr) . "<br>";
    echo "<br>";
    echo "El contenido del array recibido es:";
    echo "<br>";
    echo "Array (";
    for ($i = 0; $i < count($arr); $i++) {
        $suma += $arr[$i];
        echo " [$i] => " . $arr[$i];
    }
    echo ")";
    
    return $suma / count($arr);
}

echo "<b>Estamos en Programa Principal</b>";
echo "<br>";
echo "Creamos el vector de valores<br>";
echo "Hacemos llamada a la función";
echo "<br><br>";

$media = MediaArray(array(10, 20, 30));

echo "<br>";
echo "<h2>La media de dichos argumentos es: $media</h2>";

?>