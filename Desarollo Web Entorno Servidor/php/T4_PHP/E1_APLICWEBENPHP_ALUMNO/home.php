<?php

include_once "./Scripts/SessionID.php";

if (!isset($_SESSION["username"])) {
    header("Location: ./index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/x-icon" href="./Media/Pictures/ai.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="ai, chat, chatbot, testing, llm, artifical intelligence, language models, hugging face">
    <meta name="description" content="Chatbot Playground te permite interactuar con multitud de modelos IA, comparar respuestas, y explorar el poder de los grandes modelos de lenguaje. ¡Prueba chatbots diferentes en un solo sitio!">
    <title>Chatbot Playground</title>
    <script src="./Scripts/Home.js" defer></script>
    <link rel="stylesheet" href="./Styles/Common.css">
    <link rel="stylesheet" href="./Styles/Home.css">
    <script type="module" src="https://md-block.verou.me/md-block.js"></script>
</head>

<body>
    <div id="sideContent">
        <h2>Modelos IA</h2>
    </div>
    <div id="content">
        <header>
            <h2 id="chatTitle">Chat</h2>
            <img src="" id="profileIcon">
        </header>
        <main>
            <div id="chat">
                <div id="chatArea"></div>
                <div id="promptArea">
                    <!-- <input type="hidden" name="currentModel" id="hiddenField"> -->
                    <textarea name="prompt" id="prompt" placeholder="Envía un mensaje" autocomplete="off"></textarea>
                    <button id="sendButton"></button>
                    <button id="downloadButton"></button>
                </div>
            </div>
        </main>
        <footer>
            © 2024/25 - Javier Sarch
        </footer>
    </div>
</body>

</html>