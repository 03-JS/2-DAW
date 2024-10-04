<?php

$email = "nombreApellido@gmail.com";
echo $email . "<br><br>";

echo "Tiene " . strlen($email) . " letras";
echo "<br>";

if (!str_contains($email, "@") || !str_contains($email, ".")) {
    echo "Es una dirección de email no válida<br>";
    echo str_contains($email, "@") ? "El dominio no es valido" : "Le falta el <b>@</b>";
    return;
}

$emailSplit = explode("@", $email);

echo "Es una dirección de email válida";
echo "<br><br>";

echo "El nombre de usuario es: " . "<b>" . $emailSplit[0] . "</b>";
echo "<br>";
echo "El dominio es: " . "<b>" . $emailSplit[1] . "</b>";

?>