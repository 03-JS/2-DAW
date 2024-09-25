<?php

$personas = array(
    "Luís" => "López",
    "Ana" => "García",
    "Sergio" => "Pérez",
    "Héctor" => "Sánchez",
    "Adrián" => "Sala"
);

echo "<h3>Vectores Asociativos-Foreach()</h3>";
echo "Visualizamos el vector creado:";
echo "<br><br>";

foreach ($personas as $nombre => $apellido) {
    echo "$nombre => $apellido";
    echo "<br>";
}

?>