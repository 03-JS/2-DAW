let awaitingResponse;

let promptElement;
// let currentModel;
const models = {
    "Phi 3.5": "microsoft/Phi-3.5-mini-instruct",
    "Mistral": "mistralai/Mistral-7B-Instruct-v0.3",
    "SmolLM v2 1.7B": "HuggingFaceTB/SmolLM2-1.7B-Instruct"
};

document.addEventListener("DOMContentLoaded", () => {
    promptElement = document.querySelector("#prompt");

    // AI Model selection
    // currentModel = models["Phi 3.5 mini"];
    for (const [key, value] of Object.entries(models)) {
        let option = document.createElement("option");
        option.value = key;
        option.innerText = key;
        userModels.appendChild(option);

        // let item = document.createElement("div");
        // item.classList.add("item");
        // if (value === currentModel) item.classList.add("focused");
        // item.innerHTML = `<img src="./Media/Pictures/ai.png">${key}`;
        // item.addEventListener("click", (event) => {
        //     if (awaitingResponse) return;
        //     for (const child of sideContent.children) {
        //         child.classList.remove("focused");
        //     }
        //     if (currentModel != models[event.target.textContent]) {
        //         let info = document.createElement("div");
        //         info.classList.add("info-message");
        //         let leftLine = document.createElement("div");
        //         leftLine.classList.add("line");
        //         let rightLine = document.createElement("div");
        //         rightLine.classList.add("line");
        //         info.appendChild(leftLine);
        //         info.appendChild(document.createTextNode(`Modelo cambiado a ${event.target.textContent}`));
        //         info.appendChild(rightLine);
        //         chatArea.appendChild(info);
        //         chatArea.scrollTop = chatArea.scrollHeight;
        //     }
        //     event.target.classList.add("focused");
        //     currentModel = models[event.target.textContent];
        // });
        // sideContent.appendChild(item);
    }

    // Display info message
    userModels.addEventListener("change", () => {
        let info = document.createElement("div");
        info.classList.add("info-message");
        let leftLine = document.createElement("div");
        leftLine.classList.add("line");
        let rightLine = document.createElement("div");
        rightLine.classList.add("line");
        info.appendChild(leftLine);
        info.appendChild(document.createTextNode(`Modelo cambiado a ${userModels.value}`));
        info.appendChild(rightLine);
        chatArea.appendChild(info);
        chatArea.scrollTop = chatArea.scrollHeight;
    });

    // Displaying chat messages
    sendButton.addEventListener("click", SendDataToServer);
    promptElement.addEventListener("keydown", SendDataToServer);

    // Changing the size of the text area
    promptElement.addEventListener('input', (event) => {
        event.target.style.height = "5vh";
        event.target.style.height = event.target.scrollHeight + 'px';
        promptElement.scrollHeight > promptElement.clientHeight ? promptElement.classList.add("scrollable") : promptElement.classList.remove("scrollable");
    });

    // Downloading chats
    downloadButton.addEventListener("click", () => {
        window.open('./Scripts/SaveConversation.php', '_blank');
    });

    // Redirect to profile page
    profileIcon.addEventListener("click", () => {
        window.location.href = "./profile.php";
    });

    // Load profile picture
    fetch('./Scripts/GetUserData.php', {})
        .then(response => response.text())
        .then(data => {
            let json = JSON.parse(data);
            profileIcon.src = json.src.substring(1);
        })
        .catch(error => console.error(error));

    /* Sync inputs with sliders */
    tempValue.addEventListener("input", () => temp.value = tempValue.value);
    temp.addEventListener("input", () => tempValue.value = temp.value);
    maxTokensValue.addEventListener("input", () => maxTokens.value = maxTokensValue.value);
    maxTokens.addEventListener("input", () => maxTokensValue.value = maxTokens.value);
    topPValue.addEventListener("input", () => topP.value = topPValue.value);
    topP.addEventListener("input", () => topPValue.value = topP.value);
    freqPenaltyValue.addEventListener("input", () => freqPenalty.value = freqPenaltyValue.value);
    freqPenalty.addEventListener("input", () => freqPenaltyValue.value = freqPenalty.value);
    // presPenaltyValue.addEventListener("input", () => presPenalty.value = presPenaltyValue.value);
    // presPenalty.addEventListener("input", () => presPenaltyValue.value = presPenalty.value);

    // Open model addition window
    addModel.addEventListener("click", () => blocker.classList.remove("hidden"));

    // Enable add button
    modelName.addEventListener("input", EnableAddButton);
    modelURL.addEventListener("input", EnableAddButton);

    // Close model addition window
    add.addEventListener("click", () => {
        let option = document.createElement("option");
        option.value = modelName.value;
        option.innerText = modelName.value;
        userModels.appendChild(option);
        models[modelName.value] = modelURL.value;
        blocker.classList.add("hidden")
    });
    cancel.addEventListener("click", () => blocker.classList.add("hidden"));
});

function SendDataToServer(event) {
    if (event.key && (event.key != "Enter" || event.shiftKey)) return;
    if (promptElement.value.trim() == "") return;
    if (awaitingResponse) return;
    event.preventDefault();
    event.target.style.height = "5vh";
    let aiName = Object.keys(models).find((key) => models[key] === models[userModels.value]);

    // Create form data
    const formData = new FormData();
    formData.append("modelDisplayName", aiName);
    formData.append("currentModel", models[userModels.value]);
    formData.append("prompt", promptElement.value.replace(/[\r\n]/g, ''));
    formData.append("temperature", temp.value);
    formData.append("maxTokens", maxTokens.value);
    formData.append("topP", topP.value);
    formData.append("freqPenalty", freqPenalty.value);
    // formData.append("presPenalty", presPenalty.value);
    formData.append("apiKey", apiKey.value);

    // Display message
    let userMessage = document.createElement("div");
    userMessage.classList.add("user-message");
    userMessage.innerText = promptElement.value;
    promptElement.value = "";
    chatArea.appendChild(userMessage);
    chatArea.scrollTop = chatArea.scrollHeight;
    awaitingResponse = true;
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
            console.log(data);
            // Display LLM message
            let json = JSON.parse(data);
            // console.log(json);
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

function EnableAddButton(event) {
    if (event.target.value != event.target.defaultValue) add.classList.remove("greyed-out");
    else add.classList.add("greyed-out");
}