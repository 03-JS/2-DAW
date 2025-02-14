<?php

require_once 'bootstrap.php';

use App\Entity\Equipo; // Importa la clase Equipo

// Datos del equipo a insertar
$nombre    = 'Equipo5';
$socios    = 5000;
$fundacion = 1905;
$ciudad    = 'Ciudad5';

try {
    // Crear una nueva instancia de la entidad Equipo
    $equipo = new Equipo();

    $equipo->setNombre($nombre);
    $equipo->setSocios($socios);
    $equipo->setFundacion($fundacion);
    $equipo->setCiudad($ciudad);

    // Usar el EntityManager para persistir el nuevo equipo
    $entityManager->persist($equipo);
    $entityManager->flush();

    echo "¡Equipo insertado con éxito! ID: " . $equipo->getId(); // Imprime el ID del equipo insertado

} catch (Exception $e) {
    echo "Error al insertar el equipo: " . $e->getMessage(); // Imprime el mensaje de error
}

?>