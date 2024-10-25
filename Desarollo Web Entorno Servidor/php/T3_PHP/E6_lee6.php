<?php

$file = fopen("E6_mensajes5.txt", "r");
while (!feof($file)) {
    echo date('d/m/Y') . " | " . fgets($file) . "<br />";
}
fclose($file);

?>