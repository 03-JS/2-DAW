<?php
/* HAY QUE CREAR LOS COOKIES ANTES DE CUALQUIER ETIQUETA HTML*/

$segundos_un_anyo = 365 * 24 * 60 * 60;
$fecha_expiracion = time() + $segundos_un_anyo; // Caduca en un año
if (isset($_COOKIE['contador'])) {
    // si existe la vble cookie, se incrementa su valor en 1
    // y se le fija fecha de expiración

    $veces = $_COOKIE['contador'] + 1;
    setcookie('contador', $veces, $fecha_expiracion);
    $mensaje = 'Número de visitas a la web: ' . $_COOKIE['contador'];
    echo $mensaje . '<br>';
} else {
    // si no existe la vble cookie, se crea y se da bienvenida
    $veces = 1;
    setcookie('contador', $veces, $fecha_expiracion);
    $mensaje = 'Has visitado la página por primera vez';
    echo $mensaje . '<br>';
}

?>

<html>
<head>
    <meta charset="utf-8" />
    <title> Ejemplo de cookies</title>
</head>
<body>
    <h4>Ejemplo de COOKIES en página web</h4>
</body>
</html>
