<?php

echo "<b>Añadiendo en fichero</b>";
echo "<br><br>";
echo "<b>Se AÑADEN datos cada vez que ejecutamos</b>";

$file = fopen("E5_mensajes2.txt", "a+");
fwrite($file, "Primera línea del saludo<br>" . PHP_EOL);
fwrite($file, "Segunda línea del saludo<br>" . PHP_EOL);
fwrite($file, date('d/m/Y h:i:s a') . PHP_EOL);
fclose($file);

?>