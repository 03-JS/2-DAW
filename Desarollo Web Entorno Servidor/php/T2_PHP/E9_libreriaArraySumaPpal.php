<?php
include("E9_libreriaArraySuma.php");

echo "<style>
            table, th, td {
                border: 1px solid black;
                width: 25%
            }
        </style>";

$array = array(10, 20, 30, 40, 50);

echo "ArraySuma:<br>";
ArraySuma($array);
echo "<br>";

echo "ArraySumaTabla:<br>";
ArraySumaTabla($array);
echo "<br>";

?>