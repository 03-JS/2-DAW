<?php

if (!empty($_GET["nombre"])) {
    echo "Hola " . $_GET["nombre"];
} else {
    echo "No hay datos para visualizar";
}

?>