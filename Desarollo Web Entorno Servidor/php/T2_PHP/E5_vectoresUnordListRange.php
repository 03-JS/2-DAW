<?php

$nums = range(10, 100, 10);

echo "<ul>";

for ($i = 0; $i < count($nums); $i++)
{
   echo "<li>$nums[$i]</li>"; 
}

echo "</ul>";

?>