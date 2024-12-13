<?php

$param = escapeshellarg("Write a simple hello world program in php");

$command = escapeshellcmd("python test.py " . escapeshellarg($param));

echo shell_exec($command);

?>