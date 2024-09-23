<?php

include ("E5_datPersonales.php");

$personas = array($nombre, $apellidos, $edad, $tlf, $nombre1, $apellidos1, $edad1, $tlf1);

echo "<b>Los datos del array son:</b><br>";

foreach ($personas as $valor) {
    echo $valor;
    echo "<br>";
}

?>