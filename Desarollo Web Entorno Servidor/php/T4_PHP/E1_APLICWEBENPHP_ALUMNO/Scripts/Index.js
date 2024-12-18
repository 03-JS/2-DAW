let promptElement;

let currentModel;
const models = {
    "StarChat2": "HuggingFaceH4/starchat2-15b-v0.1",
    "Qwen2.5-Coder": "Qwen/Qwen2.5-Coder-32B-Instruct",
    "Phi 3.5 mini": "microsoft/Phi-3.5-mini-instruct",
    "Zephyr": "HuggingFaceH4/zephyr-7b-beta",
    "Hermes 3": "NousResearch/Hermes-3-Llama-3.2-3B",
    "Mistral-Nemo": "mistralai/Mistral-Nemo-Instruct-2407"
}; // Store in a database. Access it with php

document.addEventListener("DOMContentLoaded", () => {
    promptElement = document.querySelector("#prompt");
    
    // AI Model selection
    currentModel = models["StarChat2"];
    for (const [key, value] of Object.entries(models)) {
        let item = document.createElement("div");
        item.classList.add("item");
        if (value === currentModel) item.classList.add("focused");
        item.innerHTML = `<img src="./Media/Pictures/ai.png">${key}`;
        item.addEventListener("click", (event) => {
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
            }
            event.target.classList.add("focused");
            currentModel = models[event.target.textContent];
            hiddenField.value = currentModel;
        });
        sideContent.appendChild(item);
    }

    // Displaying chat messages
    sendButton.addEventListener("click", SendDataToServer);
    promptElement.addEventListener("keydown", SendDataToServer);
});

async function SendDataToServer(event) {
    if (event.key && event.key != "Enter") return;

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

    // Send form data
    fetch('./Scripts/ProcessForm.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Display LLM message
        let aiMessage = document.createElement("div");
        aiMessage.classList.add("ai-message");
        if (data.success) {    
            aiMessage.innerHTML = data.output;
        } else {
            aiMessage.innerHTML = data.message; 
        }
        chatArea.appendChild(aiMessage);
    })
    .catch(error => console.error('Error:', error));
}