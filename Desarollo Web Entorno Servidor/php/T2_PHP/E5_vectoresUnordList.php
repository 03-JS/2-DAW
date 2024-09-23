<?php

/*
 Desarrollada
 */

$nums[0] = 10;
$nums[1] = 20;
$nums[2] = 30;
$nums[3] = 40;
$nums[4] = 50;
$nums[5] = 60;
$nums[6] = 70;
$nums[7] = 80;
$nums[8] = 90;
$nums[9] = 100;
 
/*
 Abreviada
 */

$nums = array(10, 20, 30, 40, 50, 60, 70, 80, 90, 100);

echo "<ul>";

for ($i = 0; $i < count($nums); $i++)
{
   echo "<li>$nums[$i]</li>"; 
}

echo "</ul>";

?>