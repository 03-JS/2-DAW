<?php
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/vendor/autoload.php';

// Rutas donde se encuentran las entidades
$paths = [__DIR__ . '/src/Entity'];
$isDevMode = true;

// Configuración de metadatos (usando attributes para Doctrine ORM 3.x)
$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

// Configuración de la conexión a la base de datos
$connectionParams = [
    'dbname' => 'doctrine_dwes',
    'user' => 'root',
    'password' => '',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql',
];

// Crear conexión usando DriverManager
$connection = DriverManager::getConnection($connectionParams, $config);

// Crear el EntityManager
$entityManager = new EntityManager($connection, $config);
?>