<?php

function GenPasswd($baseLen, $specialLen, $rep)
{
    $chars = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l",
        "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    $specialChars = array(".", ",", ":", ";", "?", "¿", "^", "'", "¨", "-",
        "_", "+", "*", "!", "¡", "·", "$", "%", "&", "|", "/", "(", ")", "=",
        "<", ">", "~", "[", "]", "{", "}", "#");
    for ($i = 0; $i < $rep; $i++) {
        $str = "";
        $specials = "";
        for ($j = 0; $j < $baseLen; $j++) {
            $str .= $chars[random_int(0, count($chars) - 1)];
        }
        for ($j = 0; $j < $specialLen; $j++) {
            $specials .= $specialChars[random_int(0, count($specialChars) - 1)];
        }
        $result = strtolower($_GET["sort"]) == "especiales" ? $specials . $str : $str . $specials;
        echo "$result<br>";
    }
}

GenPasswd($_GET["base"], $_GET["especiales"], $_GET["repeticiones"]);

?>