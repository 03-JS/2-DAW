<?php 

echo "<style>
            table, th, td {
                border: 1px solid black;
                width: 25%
            }
        </style>";

$persona = array(0, 0, 0);

function ArrayRef($nombre, $apellido, $edad, &$persona) {
    $persona = array($nombre, $apellido, $edad);
}

echo "Contenido inicial del array:";

echo "<table>";
echo "<tr>";
for ($i = 0; $i < count($persona); $i++) {
    echo "<td>" . $persona[$i] . "</td>";
}
echo "</tr>";
echo "</table>";
echo "<br>";

echo "Invocando a función...";
echo "<br>";
echo "Contenido tras la ejecución de la función:";

ArrayRef("Ana", "Varela", 20, $persona);

echo "<table>";
echo "<tr>";
for ($i = 0; $i < count($persona); $i++) {
    echo "<td>" . $persona[$i] . "</td>";
}
echo "</tr>";
echo "</table>";

?>