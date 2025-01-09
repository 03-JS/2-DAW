<?php

$peliculas = simplexml_load_file("./peliculas.xml");

$personajes = $peliculas->xpath("//personaje");

foreach ($personajes as $personaje) {
    echo "Nombre: " . $personaje->nombre . "<br>";
    echo "Actor: " . $personaje->actor . "<br>";
    echo "<br>";
}

?>