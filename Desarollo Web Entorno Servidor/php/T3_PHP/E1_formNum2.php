<?php

echo "<h1>Introducción de dos números</h1>";
echo "<p><b>Operaciones básicas</b></p>";

echo "<h1>Las operaciones aritméticas son:</h1>";

if (empty($_GET["num1"]) && empty($_GET["num2"])) {
    echo "Ambos campos están vacíos";
    return;
} else if (empty($_GET["num1"])) {
    echo "El primer campo está vacío";
    return;
} else if (empty($_GET["num2"])) {
    echo "El segundo campo está vacío";
    return;
}

echo "La suma vale: " . $_GET["num1"] + $_GET["num2"];
echo "<br>";
echo "La resta vale: " . $_GET["num1"] - $_GET["num2"];
echo "<br>";
echo "La multiplicación vale: " . $_GET["num1"] * $_GET["num2"];
echo "<br>";
echo "La división vale: " . $_GET["num1"] / $_GET["num2"];
echo "<br>";
echo "El resto de la división vale: " . $_GET["num1"] % $_GET["num2"];

echo "<h1>Las operaciones lógicas son:</h1>";

echo "AND de los números: " . ($_GET["num1"] && $_GET["num2"]);
echo "<br>";
echo "OR de los números: " . ($_GET["num1"] || $_GET["num2"]);

echo "<h1>Las operaciones a nivel de bit son:</h1>";
echo "AND bit de los números: " . ($_GET["num1"] & $_GET["num2"]);
echo "<br>";
echo "OR bit de los números: " . ($_GET["num1"] | $_GET["num2"]);
echo "<br>";
echo "Desplazamiento del número: " . $_GET["num1"] . "==>" . $_GET["num2"] . " a la izquierda " . $_GET["num1"] << $_GET["num2"];
echo "<br>";
echo "Desplazamiento del número: " . $_GET["num1"] . "==>" . $_GET["num2"] . " a la derecha " . $_GET["num1"] >> $_GET["num2"];
echo "<br>";
