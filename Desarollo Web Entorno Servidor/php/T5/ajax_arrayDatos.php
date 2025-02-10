<?php
// Array con nombres
$a[1] = "Ana";
$a[2] = "Belén";
$a[3] = "Carmen";
$a[4] = "Daniel";

// Parámetro para buscar
$q = $_GET["q"];

$resultado = "";

// Comprobación
if ($q !== "") {
    $q   = strtolower($q); // Convertir a minúsculas para búsqueda insensible a mayúsculas
    $tam = strlen($q);     // Obtener la longitud del parámetro de búsqueda

    foreach ($a as $nombre) {
        if (stristr($q, substr($nombre, 0, $tam))) { // Buscar coincidencias parciales desde el inicio
            if ($resultado === "") {
                $resultado = "<p>" . $nombre . "</p>"; // Crear el primer resultado con etiquetas <p>
            } else {
                $resultado .= "<p>" . $nombre . "</p>"; // Añadir más resultados con etiquetas <p>
            }
        }
    }
}

// Mensaje para cada caso
if ($resultado === "") {
    echo "no existen coincidencias"; // Mostrar mensaje si no hay coincidencias
} else {
    echo $resultado; // Mostrar los resultados si hay coincidencias
}

?>