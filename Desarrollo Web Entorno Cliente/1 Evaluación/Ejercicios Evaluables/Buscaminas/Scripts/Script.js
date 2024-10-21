let points = 0;

function Main() {
    document.addEventListener("click", (event) => {
        if (event.target.classList.contains("casilla")) {
            event.target.classList.remove("oculto");
            points += eval(`(${event.target.innerText} + 1) * ${numMinas.value}`);
            puntos.innerText = points + `<br>puntos`;
        }
        if (event.target.classList.contains("mina")) {
            mensajeFinal.innerText = `Has perdido con ${points}`;
            protector.classList.remove("ocultar");
            mensajeFinal.classList.remove("ocultar");
        };
    });

    empezar.addEventListener("click", () => {
        if (numMinas.value < 5 || numMinas.value > 50) error.innerText = "Tiene que ser un valor entre 5 y 50";
        else {
            numMinas.classList.add("ocultar");
            empezar.classList.add("ocultar");
            error.classList.add("ocultar");
            CreateSlots();
        }
    });
}

function CreateSlots() {
    for (let i = 0; i < 100; i++) {
        let slot = document.createElement("div");
        slot.classList.add("casilla", "oculto");
        tablero.appendChild(slot);
    }
}