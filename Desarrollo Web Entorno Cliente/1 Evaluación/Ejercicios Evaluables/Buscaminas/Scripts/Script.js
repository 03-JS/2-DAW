let points = 0;

function Main() {
    // Slots click event
    document.addEventListener("click", (event) => {
        if (event.target.classList.contains("casilla") && event.target.classList.contains("oculto")) {
            event.target.classList.remove("oculto");
            if (event.target.classList.contains("poco") || event.target.classList.contains("medio") || event.target.classList.contains("mucho")) points += eval(`(${event.target.innerText} + 1) * ${numMinas.value}`);
            puntos.innerHTML = points + `<br>puntos`;
        }
        if (event.target.classList.contains("mina")) {
            let textNode = Array.from(mensajeFinal.childNodes).find(node => node.nodeType === Node.TEXT_NODE);
            textNode.textContent = `Has perdido con ${points} puntos`;
            protector.classList.remove("ocultar");
            mensajeFinal.classList.remove("ocultar");
        };
    });

    // Other click events
    empezar.addEventListener("click", () => {
        if (numMinas.value < 5 || numMinas.value > 50) error.innerText = "Tiene que ser un valor entre 5 y 50";
        else {
            numMinas.classList.add("ocultar");
            empezar.classList.add("ocultar");
            error.classList.add("ocultar");
            CreateSlots();
        }
    });
    
    volver.addEventListener("click", () => {
        location.reload();
    });
}

function CreateSlots() {
    for (let i = 0; i < 100; i++) {
        let slot = document.createElement("div");
        slot.textContent = `${i}`;
        slot.classList.add("casilla", "oculto");
        tablero.appendChild(slot);
    }
    let i = 0;
    let rand = 0;
    let slotNodes = document.querySelectorAll(".casilla");
    while (i != numMinas.value) {
        do {
            rand = Math.floor(Math.random() * slotNodes.length);
            slotNodes.item(Array.prototype.indexOf.call(slotNodes, slotNodes[rand])).classList.add("mina");
        } while (!slotNodes[rand].classList.contains("mina"));
        i++;
    }
}