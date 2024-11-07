<h2>Página 2</h2>

<?php

session_start();
echo "Variable de sesión: " . $_SESSION["sessionVar"];
echo "<br>";
unset($_SESSION["sessionVar"]);

?>

<a href="E9_page3.php">Siguiente Página</a>