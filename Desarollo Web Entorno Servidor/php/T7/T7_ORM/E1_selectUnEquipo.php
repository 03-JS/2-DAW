<?php
// buscaEquipo.php

require_once 'bootstrap.php';

use App\Entity\Equipo;

// ID del equipo que se desea buscar
$id = 4;

try {
    // Buscar el equipo por ID
    $equipo = $entityManager->find(Equipo::class, $id);

    if ($equipo === null) {
        echo "No se encontró el equipo con ID: $id\n";
        exit(1); // Salir con un código de error
    }

    // Mostrar información del equipo
    echo "ID: " . $equipo->getId() . "\n";
    echo "Nombre: " . $equipo->getNombre() . "\n";
    echo "Ciudad: " . $equipo->getCiudad() . "\n";
    echo "Socios: " . $equipo->getSocios() . "\n";
    echo "Fundación: " . $equipo->getFundacion() . "\n";

} catch (Exception $e) {
    echo "Error al buscar el equipo: " . $e->getMessage() . "\n";
}

?>