<?php

echo "<p>Utiliza fpassthru()</p>";
echo "<b>Visualizamos el contenido del fichero</b>";
echo "<ul>";
echo "<li>Archivo completo mediante readfile()</li>";
echo "<li>La primera línea en negrita, utilizando fopen() y fgets()</li>";
echo "<li>Volcar el resto del fichero salida estándar con fpassthru()</li>";
echo "</ul>";

echo "Visualizamos con readfile():<br>";
readfile("E6_mensajes4.txt");
echo "<br>";
$file = fopen("E6_mensajes4.txt", "r");
echo "<b>" . fgets($file) . "</b>";
echo "<br>";
echo fpassthru($file);
fclose($file);

?>