<?php

function VectoresUnordList($array) {
    echo "<ul>";
    for ($i = 0; $i < count($array); $i++) {
        echo "<li>$array[$i]</li>";
    }
    echo "</ul>";
}

function VectoresUnordListRange() {
    $nums = range(10, 100, 10);
    echo "<ul>";
    for ($i = 0; $i < count($nums); $i++) {
        echo "<li>$nums[$i]</li>";
    }
    echo "</ul>";
}

function VectoresWhile($array) {
    $var = reset($array);
    echo "<ul>";
    while ($var) {
        echo "<li>$var</li>";
        $var = next($array);
    }
    echo "</ul>";
}

function VectoresInverso($array) {
    $var = end($array);
    echo "<ul>";
    while ($var) {
        echo "<li>$var</li>";
        $var = prev($array);
    }
    echo "</ul>";
}

function VectoresForEach($array) {
    echo "<ul>";
    foreach ($array as $array) {
        echo "<li>$array</li>";
    }
    echo "</ul>";
}

?>