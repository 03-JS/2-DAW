<?php

    include_once "./Scripts/SessionID.php";

    if (! isset($_SESSION["username"])) {
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
        <h2>Panel de control</h2>
        <div class="line"></div>
        <div class="side-row">
            <label for="userModels">Modelo:</label>
            <select name="userModels" id="userModels">
            </select>
        </div>
        <div class="slider-section">
            <label for="temp">Temperatura</label>
            <input type="text" name="tempValue" id="tempValue" class="slider-value" value="1">
            <input type="range" name="temp" id="temp" min="0" max="2" step="0.1" value="1">
        </div>
        <div class="slider-section">
            <label for="maxTokens">Máximo de Tokens</label>
            <input type="text" name="maxTokensValue" id="maxTokensValue" class="slider-value" value="2048">
            <input type="range" name="maxTokens" id="maxTokens" min="100" max="16000" step="1" value="2048">
        </div>
        <div class="slider-section">
            <label for="topP">Top P</label>
            <input type="text" name="topPValue" id="topPValue" class="slider-value" value="0.99">
            <input type="range" name="topP" id="topP" min="0.01" max="0.99" step="0.01" value="0.99">
        </div>
        <div class="slider-section">
            <label for="freqPenalty">Frequency Penalty</label>
            <input type="text" name="freqPenaltyValue" id="freqPenaltyValue" class="slider-value" value="0">
            <input type="range" name="freqPenalty" id="freqPenalty" min="0" max="2" step="0.1" value="0">
        </div>
        <!-- <div class="slider-section">
            <label for="presPenalty">Presence Penalty</label>
            <input type="text" name="presPenaltyValue" id="presPenaltyValue" class="slider-value" value="0">
            <input type="range" name="presPenalty" id="presPenalty" min="0" max="2" step="0.1" value="0">
        </div> -->
        <div class="slider-section">
            <span>HuggingFace API Key:</span>
            <input type="password" name="apiKey" id="apiKey" value="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">
        </div>
        <button id="addModel">Añade un modelo</button>
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
    <div id="blocker" class="hidden">
        <div class="pop-up">
            <h1>Añade un modelo</h1>
            <input type="text" id="modelName" placeholder="Nombre">
            <input type="text" id="modelURL" placeholder="URL">
            <div class="row">
                <button class="greyed-out" id="add">Añadir</button>
                <button id="cancel">Cancelar</button>
            </div>
        </div>
    </div>
</body>

</html>
