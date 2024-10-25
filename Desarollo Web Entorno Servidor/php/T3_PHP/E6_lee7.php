<?php

$file = fopen("E6_mensajes5.txt", "r");
while (!feof($file)) {
    $char = fgetc($file);
    if ($char == "\n") $char = '<br>';
    echo $char;
}
fclose($file);

?>