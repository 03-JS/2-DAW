<?php

function GenPasswd($baseLen, $specialLen)
{
    $chars = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l",
        "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    $specialChars = array(".", ",", ":", ";", "?", "¿", "^", "'", "¨", "-",
        "_", "+", "*", "!", "¡", "·", "$", "%", "&", "|", "/", "(", ")", "=",
        "<", ">", "~", "[", "]", "{", "}", "#");
    $str = "";
    $specials = "";
    for ($i = 0; $i < $baseLen; $i++) {
        $str .= $chars[random_int(0, count($chars) - 1)];
    }
    for ($i = 0; $i < $specialLen; $i++) {
        $specials .= $specialChars[random_int(0, count($specialChars) - 1)];
    }
    $result = strtolower($_GET["sort"]) == "especiales" ? $specials . $str : $str . $specials;
    return $result;
}

echo GenPasswd($_GET["base"], $_GET["especiales"]);

?>