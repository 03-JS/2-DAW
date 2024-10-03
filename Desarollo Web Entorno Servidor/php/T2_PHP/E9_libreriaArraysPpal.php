<?php

include("E9_libreriaArrays.php");

$array = array(10, 20, 30, 40);

echo "VectoresUnordList:<br>";
VectoresUnordList($array);
echo "<br>";

echo "VectoresUnordListRange:<br>";
VectoresUnordListRange();
echo "<br>";

echo "VectoresWhile:<br>";
VectoresWhile($array);
echo "<br>";

echo "VectoresInverso:<br>";
VectoresInverso($array);
echo "<br>";

echo "VectoresForEach:<br>";
VectoresForEach($array);
echo "<br>";

?>