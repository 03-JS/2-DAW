<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php

function RemoveCookie($name)
{
    if (isset($_COOKIE[$name])) {
        unset($_COOKIE[$name]);
        echo "<p>Borrada la cookie <b>$name</b></p>";
    }
}

?>
    <p>Intentando borrar la cookie manualmente...</p>
    <?php RemoveCookie("contador")?>
    <p>Intentamos ver su contenido...</p>
    <?php

if (!isset($_COOKIE["contador"])) {
    echo "<p>No existe</p>";
} else {
    echo "<p>" . $_COOKIE["contador"] . "</p>";
}

?>
</body>

</html>