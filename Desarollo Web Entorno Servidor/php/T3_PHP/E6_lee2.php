<?php

echo "<p><b>Utiliza fread()</b></p>";
echo "<p>El contenido del fichero es...</p>";

$file = @fopen("E6_mensajes2.txt", "r");
$fileContent = fread($file, filesize("E6_mensajes2.txt"));
echo $fileContent;
fclose($file);

?>