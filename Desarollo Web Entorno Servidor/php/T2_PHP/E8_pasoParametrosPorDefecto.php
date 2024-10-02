<?php
// ejemplo de paso de parámetros por defecto a la función
function porDefecto( $param1='You', $param2='my', $param3 = 'Blue' ){
    return $param1 . ' ' . $param2 . ' ' . $param3;
}

/* invocación de la función */
$argum1='Hello';
$argum2='World';
$argum3='Moon';

echo "Invocamos con tres argumentos<br>";
echo porDefecto( $argum1, $argum2, $argum3 ); // 'hello world Moon'
echo "<br>Invocamos con dos argumentos<br>";
echo porDefecto( $argum1, $argum2 ); // 'hello world Blue'
echo "<br>Ahora Invocamos con un solo argumento<br>";
echo porDefecto( $argum1 ); // 'hello my Blue'
echo "<br>Ahora sin argumentos<br>";
echo porDefecto (); // 'You my Blue'
?>