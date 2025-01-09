<?php

$peliculas = simplexml_load_file("./peliculas.xml");

foreach ($peliculas as $pelicula) {
    echo "Título: " . $pelicula->titulo . "<br>";

    foreach ($pelicula->personajes->personaje as $personaje) {
        echo "Personaje: " . $personaje->nombre . "<br>";
        echo "Actor: " . $personaje->actor . "<br>";
    }

    echo "Argumento: $pelicula->argumento";

    foreach ($pelicula->{"grandes-frases"}->frase as $frase) {
        echo "Frase destacada: $frase<br>";
    }

    foreach ($pelicula->puntuacion as $puntuacion) {
        echo "Puntuación (" . $puntuacion["tipo"] . "): $puntuacion<br>";
    }
}

?>