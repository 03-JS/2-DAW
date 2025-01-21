const socket = io();

window.addEventListener("load", () => {
    boton.addEventListener("click", (event) => {
        if (input.value) {
            socket.emit("chat", input.value);
            const item = document.createElement("li");
            item.textContent = input.value;
            item.classList.add("enviado");
            mensajes.appendChild(item);
            input.value = "";
        }
    });

    socket.on("chat", (msg) => {
        const item = document.createElement("li");
        item.textContent = input.value;
        mensajes.appendChild(item);
        window.scrollTo(0, document.body.scrollHeight);
    });
});