<?php
require 'vendor/autoload.php'; // Incluye el autoload de Composer

try {
    // Cadena de conexión a MongoDB
    $cadenaConexion = 'mongodb://127.0.0.1:27017';

    // Crear una instancia del cliente de MongoDB
    $cliente = new MongoDB\Client($cadenaConexion);

    $bd = $cliente->userblogbd;
    $usuarios = $bd->userblog;
    $criterio = ['cp' => '39005'];

    // Contar los usuarios que coincidan con el criterio
    $totalUsuarios = $usuarios->countDocuments($criterio);

    // Mostrar el total de usuarios
    echo "Total de usuarios con código postal 39005: $totalUsuarios" . PHP_EOL . PHP_EOL;

    // Visualizar los usuarios que coincidan con el criterio
    $cursor = $usuarios->find($criterio);

    echo "Usuarios con código postal 39005:" . PHP_EOL;
    foreach ($cursor as $usuario) {
        print_r($usuario);
    }

} catch (Exception $e) {
    // Captura y muestra el error
    echo "Error: " . $e->getMessage();
}
?>
