<?php

require_once "E12_areaTriangulo.php";

$base = 5;
$altura = 4;
$obj = new E12_areaTriangulo();
$area = $obj->AreaTriangulo($base, $altura);

echo "<b>ÁREA del TRIÁNGULO de base $base y altura $altura = $area</b>";

?>