<?php

session_start();
echo "El contenido de 'session_var' es " . $_SESSION["session_var"];
echo "<br><br>";
echo "Aplicamos unset";
echo "<br><br>";
unset($_SESSION["session_var"]);

?>

<a href="E11_page3.php">Siguiente página</a>