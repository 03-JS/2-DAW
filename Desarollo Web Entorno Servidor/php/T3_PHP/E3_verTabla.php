<?php

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