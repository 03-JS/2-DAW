<?php
session_start();
if (isset($_POST['userid']) && isset($_POST['password'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $hostname = 'localhost';
    $user_bd = 'root';
    $pass_bd = '';
    $database = 'bd1_dwes';

    // Realiza conexión con MySQL
    $link = mysqli_connect($hostname, $user_bd, $pass_bd, $database);
    if (!$link) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "Error de depuración: " . mysqli_connect_errno() . "<br>";
    } else {
        $query = 'select * from usuarios ' .
            'where user = "' . $userid . '"' .
            'and pass="' . $password . '"';
        $result = mysqli_query($link, $query);
        $num_filas = mysqli_num_rows($result);
        if ($num_filas > 0) {
            $_SESSION['valid_user'] = $userid;
            echo "Usuario '" . $_SESSION['valid_user'] . "' conectado<br>";
            // Cierra la BD
            mysqli_close($link);
        }
    }
}
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Página Inicial</h1>
        <?php
if (isset($_SESSION['valid_user'])) {
    echo 'Estás conectado como : ' . $_SESSION['valid_user'] . '<br><br>';
    echo '<a href="E11_logout.php">Salir (Log out)</a><br><br>';
} else {
    echo 'No. No se ha podido realizar la conexión!!<br />';
}
?>

        <form method="post" action="E11_login_valida.php">
            <table>
                <tr><td>Usuario:</td>
                    <td><input type="text" name="userid"></td>
                </tr>
                <tr><td>Contraseña:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr><td><input type="submit" value="Conectar"></td></tr>
            </table>
        </form>
        <br>
        <a href="E11_members_only.php">Sección Privada</a>
    </body>
</html>
