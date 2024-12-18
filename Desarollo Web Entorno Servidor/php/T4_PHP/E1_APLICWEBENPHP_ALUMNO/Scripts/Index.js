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
        });
        sideContent.appendChild(item);
    }
});