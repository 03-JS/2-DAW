<?php

$email = " nombreApellido@gmail.com ";
echo "Dirección a analizar:<br>$email<br><br>";

echo "Tiene " . strlen($email) . " letras";
echo "<br>";

if (str_contains($email[0], " ") || str_contains($email[strlen($email) - 1], " ")) {
    echo "Se han encontrado espacios en blanco";
    echo "<br>";
    echo "Los eliminamos...";
    echo "<br>";
    $email = trim($email);
}

echo "<br>";
echo "Buscamos .com en email...";
echo "<br>";

if (str_contains($email, ".com")) {
    $email = str_replace(".com", ".es", $email);
    echo "Hemos encontrado <b>.com</b>";
    echo "<br>";
}

echo "<br>";
echo "Dirección corregida:";
echo "<br>";
echo $email;
?>