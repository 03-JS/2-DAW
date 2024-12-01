<?php
session_start();

echo "<h1>únicamente socios</h1>";

echo "<meta charset=utf-8 />";

if (isset($_SESSION['valid_user'])) {
    echo "<p>Estás conectado como " . $_SESSION['valid_user'] . "</p>";
    echo "<p>Aquí iría el contenido de Socios Privados</p>";
} else {
    echo "<p>No estás conectado!</p>";
    echo "<p>Sólo los socios pueden ver esta página.</p>";
}

echo '<a href="E11_login_valida.php">Volver a página principal</a>';
?>