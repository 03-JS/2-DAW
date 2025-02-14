<?php
// borraEquipo.php
require_once 'bootstrap.php';

use App\Entity\Equipo;

// ID del equipo que se desea eliminar
$id = 5;

try {
    // Buscar el equipo por ID
    $equipo = $entityManager->find(Equipo::class, $id);

    if ($equipo === null) {
        echo "No se encontró el equipo con ID: $id\n";
        exit(1); // Salir con un código de error
    }

    // Eliminar el equipo
    $entityManager->remove($equipo);
    $entityManager->flush();

    echo "¡Equipo con ID $id eliminado con éxito!\n";

} catch (Exception $e) {
    echo "Error al eliminar el equipo: " . $e->getMessage() . "\n";
}

?>