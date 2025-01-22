<?php

require 'vendor/autoload.php';

try {
    // Cadena de conexión a MongoDB
    $cadenaConexion = 'mongodb://127.0.0.1:27017';
    // Crear una instancia del cliente de MongoDB
    $cliente = new MongoDB\Client($cadenaConexion);
    // Selecciona la base de datos
    $bd = $cliente->userblogbd;
    echo 'Conectado' . PHP_EOL;

    // Selecciona colección
    $userblog = $bd->userblog;

    // Inserta un nuevo usuario en la colección
    $resultado = $userblog->insertOne([
        "nombre_usuario" => "Frank_blog3",
        "nombre"         => "Frank3",
        "cuenta_twitter" => "Frank_AUS",
        "descripcion"    => "blogger aficionado",
        "telefono1"      => "731298989",
        "telefono2"      => "331131133",
        "calle"          => "Av. de los Castros",
        "numero"         => "2256",
        "cp"             => "39006",
        "ciudad"         => "Santander"
    ]);

    // Mensaje de éxito
    echo "Documento insertado con el ID: " . $resultado->getInsertedId() . PHP_EOL;

} catch (Exception $e) {
    // Captura y muestra error
    echo "Error: " . $e->getMessage();
}

?>