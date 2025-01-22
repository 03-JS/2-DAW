<?php
require_once 'vendor/autoload.php';

try {
    // Cadena de conexión a MongoDB
    $cadenaConexion = 'mongodb://127.0.0.1:27017';

    // Crear una instancia del cliente de MongoDB
    $cliente = new MongoDB\Client($cadenaConexion);

    // Selecciona la base de datos y la colección
    $bd = $cliente->userblogbd;
    $coleccion = $bd->userblog2;

    // Inserta varios documentos
    $result = $coleccion->insertMany([
        [
            'nombre_usuario' => 'Frank_blog',
            'nombre' => 'Frank',
            'cuenta_twitter' => 'Frank_USA',
            'descripcion' => 'blogger aficionado',
            'telefono' => ['73128989', '11111111'],
            'direccion' => [
                'calle' => 'Av. de los Castros',
                'numero' => '2256',
                'cp' => '39005',
                'ciudad' => 'Santander'
            ]
        ],
        [
            'nombre_usuario' => 'Peter_blog',
            'nombre' => 'Peter',
            'cuenta_twitter' => 'Pete',
            'descripcion' => 'blogger aficionado',
            'telefono' => ['808080', '4323424'],
            'direccion' => [
                'calle' => 'Av. de los Castros',
                'numero' => '289s',
                'cp' => '39005',
                'ciudad' => 'Santander'
            ]
        ]
    ]);

    echo "Se han insertado " . $result->getInsertedCount() . " documentos en la colección 'userblog2'." . PHP_EOL;

} catch (Exception $e) {
    // Captura y muestra el error
    echo "Error: " . $e->getMessage();
}

?>