<?php

function MediaValoresRefer($a, &$b, $c, $d, &$suma, &$media) {
    echo "<b>Función Media Aritmética</b>";
    echo "<br>";
    echo "====================";
    echo "<br>";
    echo "Valor de los argumentos utilizados:";
    echo "<br>";
    echo "<ul>";
    $args = func_get_args();
    for ($i = 0; $i < count($args); $i++) {
        if ($i <= 3) {
            echo "<li>Párametro $i ==> " . $args[$i] . "</li>";
        }
    }
    echo "</ul>";
    echo "<br>";
    $suma = $a + $b + $c + $d;
    $media = $suma / 4;
    echo "Valor del parámetro SUMA = $suma";
    echo "<br>";
    echo "Valor del parámetro MEDIA = $media";
}

echo "<b>Programa principal</b>";
echo "<br>";
echo "<b>====================</b>";
echo "<br>";
echo "El valor de los parámetros lo establecemos desde él";
echo "<br><br>";
echo "Invocamos a la función";
echo "<br>";
echo "====================";
echo "<br><br>";

$a = 10;
$b = 20;
$c = 30;
$d = 40;
$suma;
$media;
MediaValoresRefer($a, $b, $c, $d, $suma, $media);

echo "<br><br>";
echo "<b>Estamos de nuevo en el Programa Principal</b>";
echo "<br>";
echo "<b>====================</b>";
echo "<br>";
echo "La SUMA está en el parámetro 5 y es: <b>$suma</b>";
echo "<br>";
echo "La MEDIA está en el parámetro 6 y es: <b>$media</b>";
?>