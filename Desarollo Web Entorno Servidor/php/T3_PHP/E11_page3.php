<?php

session_start();
echo "El contenido de 'session_var' es " . $_SESSION["session_var"];
echo "<br><br>";
session_destroy();

?>

<a href="E11_page3.php">Siguiente página</a>