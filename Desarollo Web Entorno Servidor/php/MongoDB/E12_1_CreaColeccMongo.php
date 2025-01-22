<?php
require_once 'vendor/autoload.php';

try {
    // Cadena de conexión a MongoDB
    $cadenaConexion = 'mongodb://127.0.0.1:27017';

    // Crear una instancia del cliente de MongoDB
    $cliente = new MongoDB\Client($cadenaConexion);

    // Selecciona la base de datos
    $bd = $cliente->userblogbd;

    // Crea una nueva colección llamada "userblog3"
    $coleccion = $bd->createCollection('userblog3');

    echo "Colección 'userblog3' creada exitosamente." . PHP_EOL;

} catch (Exception $e) {
    // Captura y muestra el error
    echo "Error: " . $e->getMessage();
}

?>