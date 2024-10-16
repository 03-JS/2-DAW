<?php

echo "<b>Tablas de multiplicar autollamante</b>";
echo "<br><br>";

if (!$_GET) {
    for ($i=1; $i <= 10; $i++) { 
        echo "<a href='E3_multiplicarSelf.php?numero=$i'>Ver la tabla del $i</a>";
        echo "<br>";
    }
    exit();
}

$num = $_GET["numero"];

echo "<style>
            table, th, td {
                border: 1px solid black;
            }
        </style>";

echo "<table>";
for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    echo "<td>$num x $i</td>";
    echo "<td>" . $num * $i . "</td>";
    echo "</tr>";
}
echo "</table>";

?>