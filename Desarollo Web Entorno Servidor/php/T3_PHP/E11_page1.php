<?php

session_start();
$_SESSION["session_var"] = "Hola Mundo!";
echo "El contenido de 'session_var' es " . $_SESSION["session_var"];
echo "<br><br>";

?>

<a href="E11_page2.php">Siguiente página</a>