<?php

require 'vendor/autoload.php';

try {
    $cadenaConexion = 'mongodb://127.0.0.1:27017';
    // Selecciona la BD
    $cliente = new MongoDB\Client($cadenaConexion);
    $bd = $cliente->userblogbd;
    echo 'Conectado';

    // Selecciona la colección
    $userblog = $bd->userblog;

    // Actualiza un usuario en la colección
    echo 'Actualiza documento: ' . PHP_EOL;
    $updateResult = $userblog->updateOne(
        ['cp' => '39006'],
        ['$set' => ['nombre_usuario' => 'Jorge_blogger']]
    );

    echo "Documentos modificados: " . $updateResult->getModifiedCount();
} catch (Exception $e) {
    print($e);
}

?>