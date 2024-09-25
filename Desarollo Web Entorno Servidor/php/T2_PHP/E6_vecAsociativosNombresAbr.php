<?php

$personas = array(
    "Juan" => "Ruíz",
    "Ana" => "García",
    "Pedro" => "Rosa",
    "Pepe" => "Gil",
    "María" => "Ortiz"
);

foreach ($personas as $nombre => $apellido) {
    echo "$nombre => $apellido";
    echo "<br>";
}

?>