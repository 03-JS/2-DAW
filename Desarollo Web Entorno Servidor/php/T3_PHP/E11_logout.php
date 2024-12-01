<?php
session_start();
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
session_destroy();
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
        <title>Desconexión</title>
    </head>
    <body>
        <h1>Desconexión (Log out)</h1>
        <?php
if (!empty($old_user)) {
    echo "<b>Desconectado usuario</b><br><br>";
} else {
    echo "No estabas conectado.<br />";
}
?>
    <a href="E11_login_valida.php">Volver a página Principal</a>
    </body>
    </html>