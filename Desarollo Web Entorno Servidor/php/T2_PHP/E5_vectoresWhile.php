<?php

$personas = array("Minos", "Juan", "Fernando", "María", "Amelia");

$str = reset($personas);
echo "<ul>";

while ($str) {
    echo "<li>$str</li>";
    $str = next($personas);
}

echo "</ul>";

?>