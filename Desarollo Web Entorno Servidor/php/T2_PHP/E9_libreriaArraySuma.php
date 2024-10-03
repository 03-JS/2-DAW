<?php

function ArraySuma($array) {
    $suma = 0;
    foreach ($array as $var) {
        echo $var;
        echo "<br>";
        $suma += $var;
    }
}

function ArraySumaTabla($array) {
    $suma = 0;
    echo "<table>";
    echo "<tr>
                <th>Posición</th>
                <th>Valor</th>
            </tr>";
    for ($i = 0; $i < count($array); $i++) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>$array[$i]</td>";
        echo "</tr>";
        $suma += $array[$i];
    }
    echo "<tr>";
    echo "<td><b>SUMA</b></td>";
    echo "<td><b>$suma</b></td>";
    echo "</tr>";
    echo "</table>";
}

?>