<h2>Página 1</h2>

<?php

session_start();
$_SESSION["sessionVar"] = "Hola mundo";
echo "Variable de sesión: " . $_SESSION["sessionVar"];
echo "<br>";

?>

<a href="E9_page2.php">Siguiente Página</a>