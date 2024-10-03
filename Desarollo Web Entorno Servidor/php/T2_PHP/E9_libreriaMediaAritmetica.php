<?php

function MediaValores() {
    $suma = 0;
    $args = func_get_args();
    
    echo "<b>Función MediaValores</b>";
    echo "<br>";
    echo "Número de argumentos utilizados: " . func_num_args() . "<br>";
    echo "Valor de los argumentos utilizados:<br>";
    echo "==========================";
    echo "<br>";
    
    for ($i = 0; $i < count($args); $i++) {
        $suma += $args[$i];
        echo "Parámetro $i ==> " . func_get_arg($i) . "<br>";
    }
    
    return $suma / func_num_args();
}

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
    echo "<br><br>";
    
    return $suma / count($arr);
}

function MediaValoresRefer($a, &$b) {
    echo "<b>Función Media Aritmética</b>";
    echo "<br>";
    echo "Número de argumentos utilizados: " . func_num_args();
    echo "<br><br>";
    echo "Valores de los argumentos utlizados:<br>";
    echo "$a y $b";
    echo "<br>";
    echo "No hace falta hacer return";
    echo "<br>";
    $b = ($a + $b) / 2;
}



?>