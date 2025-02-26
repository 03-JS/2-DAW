<?php

    session_unset();
    session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/x-icon" href="./Media/Pictures/ai.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Playground | Create an account</title>
    <script defer src="./Scripts/AccountCreation.js"></script>
    <link rel="stylesheet" href="./Styles/Common.css">
    <link rel="stylesheet" href="./Styles/Login.css">
    <link rel="stylesheet" href="./Styles/CreateAccount.css">
</head>

<body>
    <header>
        <img src="./Media/Pictures/ai.png" alt="">
        <h1>Chatbot Playground</h1>
    </header>
    <main>
        <div class="panel">
            <h1>Crear una cuenta</h1>
            <input type="text" id="username" autocomplete="off" placeholder="Nombre de usuario">
            <input type="password" id="passwd" autocomplete="off" placeholder="Contraseña">
            <div class="line"></div>
            <label for="upload" id="uploadPfp">Subir foto de perfil</label>
            <input hidden type="file" id="upload" accept="image/png, image/jpeg, image/gif">
            <button id="createAccButton">Crear cuenta</button>
            <span id="errorText"></span>
        </div>
    </main>
</body>

</html>
