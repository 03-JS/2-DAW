<?php

$Fich_autoloadPhp = 'vendor/autoload.php';

require_once $Fich_autoloadPhp;
try {
    $cadenaConexion = 'mongodb://127.0.0.1:27017';

    $cliente = new MongoDB\Client($cadenaConexion);
    $bd      = $cliente->userblogbd;
    echo 'Conectado';

} catch (Exception $e) {
    echo 'error';
    print($e);
}

?>