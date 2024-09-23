<?php

$personas = array("Minos", "Juan", "Fernando", "María", "Amelia");

$str = end($personas);
echo "<ul>";

while ($str) {
    echo "<li>$str</li>";
    $str = prev($personas);
}

echo "</ul>";

?>