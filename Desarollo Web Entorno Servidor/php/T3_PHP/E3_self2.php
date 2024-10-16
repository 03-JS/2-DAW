<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php

if (!empty($_GET["nombre"]) && !empty($_GET["empresa"]) && !empty($_GET["tlf"])) {
    echo "Su nombre: " . $_GET["nombre"];
    echo "<br>";
    echo "Su empresa: " . $_GET["empresa"];
    echo "<br>";
    echo "Su teléfono: " . $_GET["tlf"];
    exit();
}

?>
<form action="E3_self2.php" method="get">
    Nombre: <input type="text" name="nombre">
    <br>
    Empresa: <input type="text" name="empresa">
    <br>
    Teléfono: <input type="text" name="tlf" value="+34">
    <br>
    <button type="submit" name="enviar">Enviar</button>
</form>
</body>
</html>
