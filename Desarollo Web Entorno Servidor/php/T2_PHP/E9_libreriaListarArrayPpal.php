<?php 
include("E9_libreriaListarArray.php");

echo "<style>
            table, th, td {
                border: 1px solid black;
                width: 25%
            }
        </style>";

$nums = array(10, 20, 30, 40);

echo "Invocamos la función ListarVectorTabla...";
echo "<br>";
echo "Visualiza en forma de tabla:";
echo "<br><br>";

ListarVectorTabla($nums);

echo "<br>";
echo "Invocamos la función ListarVectorNoOrdenada...";
echo "<br>";
echo "En forma de lista no ordenada:";
echo "<br>";

ListarVectorNoOrdenada($nums);

?>