<?php

$peliculas = simplexml_load_file("./peliculas.xml");
$nombrePersonaje = "Sra. Programadora";

$personaje = $peliculas->xpath("//personaje[nombre='$nombrePersonaje']");

if ($personaje) {
    echo "Nombre: " . $personaje[0]->nombre . "<br>";
    echo "Actor: " . $personaje[0]->actor . "<br>";
} else {
    echo "El personaje '$nombrePersonaje' no se encontró";
}

?>