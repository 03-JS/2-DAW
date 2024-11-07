<h2>Página 3</h2>

<?php

session_start();
echo "Variable de sesión asignada? -> " . json_encode(array_key_exists("sessionVar", $_SESSION));
echo "<br>";
session_destroy();
echo "Sesión finalizada";

?>