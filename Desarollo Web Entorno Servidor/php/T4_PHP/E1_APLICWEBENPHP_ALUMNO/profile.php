<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ./index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="./Media/Pictures/ai.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
    <link rel="stylesheet" href="./Styles/Common.css">
    <link rel="stylesheet" href="./Styles/Profile.css">
    <script src="./Scripts/EditProfile.js" defer></script>
</head>

<body>
    <header>
        <h1>Editar perfil</h1>
    </header>
    <main>
        <div class="panel">
            <label for="upload" id="pfpContainer">
                <img src="" id="pfp">
                <span>Subir foto de perfil</span>
            </label>
            <input hidden type="file" id="upload" accept="image/png, image/jpeg, image/gif">
            <div id="middleRow">
                <span>Nombre de usuario</span>
                <input type="text" name="username" id="username" value="">
                <span>Contraseña</span>
                <input type="password" name="passwd" id="passwd" value="">
            </div>
            <span class="hidden" id="convTitle">Conversaciones guardadas recientemente</span>
            <div class="hidden grid"></div>
        </div>
    </main>
    <footer>
        <div class="row" id="bottomRow">
            <button id="back">Volver</button>
            <button id="save" class="greyed-out">Guardar cambios</button>
            <button id="del">Eliminar cuenta</button>
        </div>
    </footer>
</body>

</html>