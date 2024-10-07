<?php

$chars = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l",
    "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

$specialChars = array(".", ",", ":", ";", "?", "¿", "^", "'", "¨", "-",
    "_", "+", "*", "!", "¡", "·", "$", "%", "&", "|", "/", "(", ")", "=",
    "<", ">", "~", "[", "]", "{", "}", "#");

function GenPasswd($baseLen, $specialLen, $sort, $chars, $specialChars) {
    $str = "";
    $specials = "";
    for ($i = 0; $i < $baseLen; $i++) {
        $str .= $chars[random_int(0, count($chars) - 1)];
    }
    for ($i = 0; $i < $specialLen; $i++) {
        $specials .= $specialChars[random_int(0, count($specialChars) - 1)];
    }
    $result = strtolower($sort) == "especiales" ? $specials . $str : $str . $specials;
    return $result;
}

echo GenPasswd(random_int(4, 8), random_int(4, 8), "especiales", $chars, $specialChars);

?>