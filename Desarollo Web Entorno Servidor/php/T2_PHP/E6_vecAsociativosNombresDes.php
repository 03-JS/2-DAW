<?php

$personas["Juan"] = "Ruíz";
$personas["Ana"] = "García";
$personas["Pedro"] = "Rosa";
$personas["Pepe"] = "Gil";
$personas["María"] = "Ortiz";

foreach ($personas as $nombre => $apellido) {
    echo "$nombre => $apellido";
    echo "<br>";
}

?>