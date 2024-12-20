let awaitingResponse;

let promptElement;
let currentModel;
const models = {
    "Phi 3.5 mini": "microsoft/Phi-3.5-mini-instruct",
    "Zephyr": "HuggingFaceH4/zephyr-7b-beta",
    "Hermes 3": "NousResearch/Hermes-3-Llama-3.2-3B",
    "Mistral-Nemo": "mistralai/Mistral-Nemo-Instruct-2407",
    "StarChat2": "HuggingFaceH4/starchat2-15b-v0.1",
    "Qwen2.5-Coder": "Qwen/Qwen2.5-Coder-32B-Instruct"
}; // Store in a database. Access it with php

document.addEventListener("DOMContentLoaded", () => {
    promptElement = document.querySelector("#prompt");
    
    // AI Model selection
    currentModel = models["Phi 3.5 mini"];
    for (const [key, value] of Object.entries(models)) {
        let item = document.createElement("div");
        item.classList.add("item");
        if (value === currentModel) item.classList.add("focused");
        item.innerHTML = `<img src="./Media/Pictures/ai.png">${key}`;
        item.addEventListener("click", (event) => {
            if (awaitingResponse) return;
            for (const child of sideContent.children) {
                child.classList.remove("focused");
            }
            if (currentModel != models[event.target.textContent]) {
                let info = document.createElement("div");
                info.classList.add("info-message");
                let leftLine = document.createElement("div");
                leftLine.classList.add("line");
                let rightLine = document.createElement("div");
                rightLine.classList.add("line");
                info.appendChild(leftLine);
                info.appendChild(document.createTextNode(`Modelo cambiado a ${event.target.textContent}`));
                info.appendChild(rightLine);
                chatArea.appendChild(info);
                chatArea.scrollTop = chatArea.scrollHeight;
            }
            event.target.classList.add("focused");
            currentModel = models[event.target.textContent];
        });
        sideContent.appendChild(item);
    }

    // Displaying chat messages
    sendButton.addEventListener("click", SendDataToServer);
    promptElement.addEventListener("keydown", SendDataToServer);
});

async function SendDataToServer(event) {
    if (event.key && event.key != "Enter") return;
    if (promptElement.value == "") return;
    if (awaitingResponse) return;

    // Create form data
    const formData = new FormData();
    formData.append("currentModel", currentModel);
    formData.append("prompt", promptElement.value);

    // Display message
    let userMessage = document.createElement("div");
    userMessage.classList.add("user-message");
    userMessage.innerHTML = promptElement.value;
    promptElement.value = "";
    chatArea.appendChild(userMessage);
    chatArea.scrollTop = chatArea.scrollHeight;
    awaitingResponse = true;
    let aiName = Object.keys(models).find((key) => models[key] === currentModel);
    let aiMessage = document.createElement("div");
    setTimeout(() => {
        aiMessage.classList.add("ai-message", "placeholder");
        // let loadingImg = document.createElement("img");
        // loadingImg.src = "./Media/Pictures/loading.gif";
        // aiMessage.appendChild(loadingImg);
        aiMessage.appendChild(document.createTextNode("Generando respuesta"));
        chatArea.appendChild(aiMessage);
        chatArea.scrollTop = chatArea.scrollHeight;
    }, 250);

    // Send form data
    fetch('./Scripts/ProcessForm.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Display LLM message
        let json = JSON.parse(data);
        console.log(json);
        aiMessage.classList.remove("placeholder");
        if (json.success) {
            aiMessage.innerHTML = `<md-block><b>${aiName}</b>:<br>${json.output}</md-block>`;
        } else {
            aiMessage.innerHTML = `<md-block><b>${aiName}</b>:<br>Error: I was unable to generate a reply</md-block>`;
            console.error(json.message);
        }
        chatArea.scrollTop = chatArea.scrollHeight;
        awaitingResponse = false;
    })
    .catch(error => {
        aiMessage.classList.remove("placeholder");
        aiMessage.innerHTML = `<md-block><b>${aiName}</b>:<br>Error: I was unable to generate a reply</md-block>`;
        awaitingResponse = false;
        console.error('Error:', error);
    });
}