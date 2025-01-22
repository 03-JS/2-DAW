<?php

require 'vendor/autoload.php'; // Incluye el autoload de Composer

try {
    $cadenaConexion = "mongodb://127.0.0.1:27017";

    $cliente = new MongoDB\Client($cadenaConexion);
    $bd = $cliente -> userblogbd;
    echo "Conectado";

    // Devuelve todos los documentos
    echo "Todos los documentos" . PHP_EOL;
    $userblog = $bd -> userblog -> find();

    foreach ($userblog as $documento) {
        print_r($documento);
    }
} catch (Exception $e) {
    print($e);
}

?>