<?php

echo "<p><b>Utiliza filesize()</b></p>";
echo "<p>El contenido del fichero es...</p>";

$file = @fopen("E6_mensajes3.txt", "r");
$size = filesize("E6_mensajes3.txt");
$content = fread($file, $size);
echo $content;
echo "<br>";
echo "El tamaño es:";
echo "<br>";
echo "$size bytes";
fclose($file);

?>