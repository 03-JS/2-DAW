<?php

    session_unset();
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./Media/Pictures/ai.png">
    <title>Log in - Chatbot Playground</title>
    <link rel="stylesheet" href="./Styles/Common.css">
    <link rel="stylesheet" href="./Styles/Login.css">
    <script defer src="./Scripts/Login.js"></script>
</head>

<body>
    <header>
        <img src="./Media/Pictures/ai.png" alt="">
        <h1>Chatbot Playground</h1>
    </header>
    <main>
        <div class="panel">
            <h1>Iniciar sesión</h1>
            <input type="text" name="username" id="username" autocomplete="off" placeholder="Nombre de usuario">
            <input type="password" name="passwd" id="passwd" autocomplete="off" placeholder="Contraseña">
            <div class="grid-row">
                <button id="loginButton">Inicia sesión</button>
                <button id="createAccButton">Crear cuenta</button>
            </div>
            <span id="errorText"></span>
        </div>
    </main>
    <footer>
        <h2>Inicia sesión para interactuar con multitud de modelos IA, comparar respuestas, y explorar el poder de la Inteligencia Artificial generativa</h2>
    </footer>
</body>

</html>