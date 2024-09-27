<?php

function MediaValores() {
    $suma = 0;
    $args = func_get_args();
    
    echo "<b>Función media aritmética</b>";
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

echo "<b>Estamos en Programa Principal</b>";
echo "<br>";
echo "El valor de los parámetros lo establecemos desde él<br>";
echo "Hacemos llamada a la función";
echo "<br><br>";

$media = MediaValores(10, 20, 30, 40);

echo "<br>";
echo "Ahora estoy en el programa principal";
echo "<h2>La media de dichos argumentos es: $media</h2>";

?>