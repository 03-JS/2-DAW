<?php

require 'vendor/autoload.php'; // Incluye el autoload de Composer

try {
    // Cadena de conexión a MongoDB
    $cadenaConexion = 'mongodb://127.0.0.1:27017';

    // Crear una instancia del cliente de MongoDB
    $cliente = new MongoDB\Client($cadenaConexion);

    // Selecciona la base de datos
    $bd = $cliente->userblogbd;

    // Selecciona la colección
    $userblog = $bd->userblog;

    // Elimina un documento que coincide con el filtro
    $deleteResult = $userblog->deleteOne(['nombre_usuario' => 'Frank_blog']);

    // Mostrar resultado
    echo "Documentos eliminados: " . $deleteResult->getDeletedCount() . PHP_EOL;

} catch (Exception $e) {
    // Captura y muestra el error
    echo "Error: " . $e->getMessage();
}


?>