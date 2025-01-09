<?php

$peliculas = simplexml_load_file("./peliculas.xml");
$actor = "Onlivia Actora";

foreach ($peliculas as $pelicula) {
    foreach ($pelicula->personajes->personaje as $personaje) {
        if ($personaje->actor == $actor) {
            echo "<h2>Información sobre el actor '$actor':</h2>";
            echo "<b>Nombre del personaje:</b> " . $personaje->nombre . "<br>";
            echo "<b>Actor:</b> " . $personaje->actor . "<br>";
            exit;
        }
    }
}

echo "El actor '$actor' no se encontró";

?>