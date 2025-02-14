<?php
// buscaTodosEquipos.php

require_once 'bootstrap.php';

use App\Entity\Equipo;

try {
    // Obtener el repositorio de la entidad Equipo
    $equipoRepository = $entityManager->getRepository(Equipo::class);

    // Buscar todos los equipos
    $equipos = $equipoRepository->findAll();

    // Verificar si se encontraron equipos
    if (empty($equipos)) {
        echo "No se encontraron equipos.\n";
        exit(1); // Salir con un código de error
    }

    // Mostrar información de todos los equipos
    foreach ($equipos as $equipo) {
        echo "ID: " . $equipo->getId() . "\n";
        echo "Nombre: " . $equipo->getNombre() . "\n";
        echo "Ciudad: " . $equipo->getCiudad() . "\n";
        echo "Socios: " . $equipo->getSocios() . "\n";
        echo "Fundación: " . $equipo->getFundacion() . "\n";
        echo "--------------------\n"; // Separador entre equipos
    }

} catch (Exception $e) {
    echo "Error al buscar los equipos: " . $e->getMessage() . "\n";
}

?>