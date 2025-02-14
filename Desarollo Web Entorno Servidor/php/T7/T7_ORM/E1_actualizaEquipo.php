<?php
// modificaEquipo.php

require_once 'bootstrap.php';

use App\Entity\Equipo;

// ID del equipo que se desea modificar
$id = 5;

// Nuevos valores para los campos
$nuevoNombre    = "NomEqModif";
$nuevosSocios   = 12000;

try {
    // Buscar el equipo por ID
    $equipo = $entityManager->find(Equipo::class, $id);

    if ($equipo === null) {
        echo "No se encontró el equipo con ID: $id\n";
        exit(1); // Salir con un código de error
    }

    // Actualizar los campos del equipo
    $equipo->setNombre($nuevoNombre);
    $equipo->setSocios($nuevosSocios);

    // Guardar los cambios en la base de datos
    $entityManager->flush();

    echo "¡Equipo modificado con éxito! ID: " . $equipo->getId() . "\n";

} catch (Exception $e) {
    echo "Error al modificar el equipo: " . $e->getMessage() . "\n";
}

?>