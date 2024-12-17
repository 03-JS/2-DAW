<?php

$param = escapeshellarg($_POST["prompt"]);

$command = escapeshellcmd("python ./Scripts/AI.py " . escapeshellarg($param));

echo shell_exec($command);

?>