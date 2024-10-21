<?php

$file = fopen("E5_mensajes1.txt", "w");
fwrite($file, "Primera línea del saludo<br>" . PHP_EOL);
fwrite($file, "Segunda línea del saludo<br>" . PHP_EOL);
fclose($file);

?>