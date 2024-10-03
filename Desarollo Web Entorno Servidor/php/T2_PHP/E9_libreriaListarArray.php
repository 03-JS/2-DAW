<?php

function ListarVectorTabla($array) {
    echo "<table>";
    echo "<tr>
    <td>ELEMENTO</td>    
    <td>VALOR</td>    
    </tr>";
    for ($i = 0; $i < count($array); $i++) {
        echo "<tr>";
        echo "<td>$i</td>";
        echo "<td>" . $array[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function ListarVectorNoOrdenada($array) {
    echo "<ul>";
    for ($i = 0; $i < count($array); $i++) {
        echo "<li>" . $array[$i] . "</li>";
    }
    echo "</ul>";
}

?>