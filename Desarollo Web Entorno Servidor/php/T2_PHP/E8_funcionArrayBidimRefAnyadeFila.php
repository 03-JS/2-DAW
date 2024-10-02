<?php 

echo "<style>
            table, th, td {
                border: 1px solid black;
                width: 25%
            }
        </style>";

$persona = array(
        array("Nombre", "Apellido", "Edad"),
        array("Pepe", "Sala", 22)
        );

function ArrayRef($nombre, $apellido, $edad, &$persona) {
     array_push($persona, array($nombre, $apellido, $edad));
}

echo "Contenido inicial del array:";

echo "<table>";
echo "<tr>";
for ($i = 0; $i < count($persona); $i++) {
    echo "<tr>";
    for ($j = 0; $j < count($persona[$i]); $j++) {
            echo "<td>" . $persona[$i][$j] . "</td>";
    }
    echo "</tr>";
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
    echo "<tr>";
    for ($j = 0; $j < count($persona[$i]); $j++) {
            echo "<td>" . $persona[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</tr>";
echo "</table>";

?>