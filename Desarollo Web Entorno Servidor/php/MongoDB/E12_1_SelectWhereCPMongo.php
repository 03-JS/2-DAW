<?php

require_once 'vendor/autoload.php';

try {
    $cadenaConexion = 'mongodb://127.0.0.1:27017';
    $cliente = new MongoDB\Client($cadenaConexion);
    $bd = $cliente->userblogbd;

    echo 'Conectado' . PHP_EOL;

    echo "Resultado:" . PHP_EOL;
    $cursor = $bd->userblog->find(["cp" => ['$gte' => "39005"]], ["projection" => ["_id" => 0, "nombre_usuario" => 1, "cuenta_twitter" => 1]]);

    foreach ($cursor as $usuario) {
        print_r($usuario);
    }

} catch (Exception $e) {
    print ($e);
}

?>