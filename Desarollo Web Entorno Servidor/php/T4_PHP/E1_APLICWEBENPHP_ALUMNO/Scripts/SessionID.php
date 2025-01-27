<?php

session_start();
$sessionId = uniqid();
$_SESSION["id"] = $sessionId;

?>