let currentModel;
const models = {
    "GPT-2": "openai-community/gpt2",
    "Hermes 3": "NousResearch/Hermes-3-Llama-3.2-3B",
    "Athene v2": "Nexusflow/Athene-V2-Chat",
    "Qwen 2.5": "Qwen/Qwen2.5-Coder-32B-Instruct",
    "QwQ": "Qwen/QwQ-32B-Preview"
};

document.addEventListener("DOMContentLoaded", () => {
    currentModel = models["GPT-2"];
    for (const [key, value] of Object.entries(models)) {
        let div = document.createElement("div");
        div.classList.add("item");
        if (value === currentModel) div.classList.add("focused");
        div.innerHTML = `<img src="./Media/Pictures/ai.png">${key}`;
        div.addEventListener("click", (event) => {
            for (const child of sideContent.children) {
                child.classList.remove("focused");
            }
            event.target.classList.add("focused");
            currentModel = models[event.target.textContent];
        });
        sideContent.appendChild(div);
    }
});