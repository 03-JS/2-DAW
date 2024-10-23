<?php

define("PRECIO_FRENOS", 100);
define("PRECIO_ACEITE", 10);
define("PRECIO_RUEDAS", 4);

echo "<h3>Escritura en fichero en carpeta PETICIONES</h3>";
echo "<br>";
echo $_GET["usuario"] . ", su petición es la siguiente:<br>";
echo $_GET["frenos"] . " frenos<br>";
echo $_GET["aceite"] . " latas de aceite<br>";
echo $_GET["ruedas"] . " ruedas<br>";
echo "Importe total: " . ($_GET["frenos"] * PRECIO_FRENOS) + ($_GET["aceite"] * PRECIO_ACEITE) + ($_GET["ruedas"] * PRECIO_RUEDAS) . "<br>";
echo "<br>";
echo "Intentamos volcar la información";
echo "<br><br>";
echo "................................";
echo "<br><br>";

if (!file_exists("E5_peticiones/E5_petic3.txt")) {
    $file = fopen("E5_peticiones/E5_petic3.txt", "a+");
    fwrite($file, "FechaCompra\tUsuario\tDirección\tFrenos\tAceite\tRuedas" . PHP_EOL);
    fwrite($file, "===========\t=======\t=========\t======\t======\t======" . PHP_EOL);
}

$file = fopen("E5_peticiones/E5_petic3.txt", "a+");

if ($file) {
    fwrite($file, date('d/m/Y') . "\t" . $_GET["usuario"] . "\t" . $_GET["dir"] . "\t" . $_GET["frenos"] . "\t" . $_GET["aceite"] . "\t" . $_GET["ruedas"] . "\t" . PHP_EOL);
    fclose($file);
    echo "<i>Escrita la información en el archivo</i>";
    echo "<br><br>";
    echo "<i>" . realpath("E5_peticiones/E5_petic3.txt") . "</i>";
} else {
    echo "Error al abrir el archivo";
}

?>