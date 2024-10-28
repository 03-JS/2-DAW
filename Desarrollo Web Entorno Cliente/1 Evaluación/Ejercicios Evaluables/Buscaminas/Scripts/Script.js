let points = 0;

function Main() {
    /*
        Maneja los eventos relacionados con las casillas. Pensé que sería más eficiente añadirlo a document por
        la gran cantidad de casillas que hay. El primer if muestra la casilla y hace el cáclulo de puntos,
        el segundo se encarga de revisar si has hecho click sobre una mina y termina el juego.
    */ 
    document.addEventListener("click", (event) => {
        if (event.target.classList.contains("casilla") && event.target.classList.contains("oculto")) {
            event.target.classList.remove("oculto");
            if (!event.target.classList.contains("mina")) points += eval(`(${event.target.innerText} + 1) * ${numMinas.value}`);
            puntos.innerHTML = points + `<br>puntos`;
        }
        if (event.target.classList.contains("mina")) {
            let textNode = Array.from(mensajeFinal.childNodes).find(node => node.nodeType === Node.TEXT_NODE);
            textNode.textContent = `Has perdido con ${points} puntos`;
            protector.classList.remove("ocultar");
            mensajeFinal.classList.remove("ocultar");
        };
    });

    // Maneja el inicio del juego. Es bastante sencillo. Comprueba que todo es correcto, oculta los elementos
    // no deseados y genera el tablero de casillas
    empezar.addEventListener("click", () => {
        if (numMinas.value < 5 || numMinas.value > 50) error.innerText = "Tiene que ser un valor entre 5 y 50";
        else {
            numMinas.classList.add("ocultar");
            empezar.classList.add("ocultar");
            error.classList.add("ocultar");
            CreateSlots();   
        }
    });
    
    // Más sencillo todavía. Recarga la página al hacer click sobre el botón de volver
    // que aparece cuando termina el juego
    volver.addEventListener("click", () => {
        location.reload();
    });
}

/*
    Crea las casillas del juego.
    Para ello se crean 100 elementos div a los que después les añadimos las clases CSS oculto y casilla.
    Después añadimos el número de minas según el número introducido con anterioridad.
    Por último revisamos las minas cercanas a cada casilla y les añadimos el número y estilo correspondiente.
*/
function CreateSlots() {
    for (let i = 0; i < 100; i++) {
        let slot = document.createElement("div");
        slot.classList.add("casilla", "oculto");
        tablero.appendChild(slot);
    }
    let i = 0;
    let slotNodes = document.querySelectorAll(".casilla");
    let mineCount = numMinas.value;
    let selectedIndices = new Set();
    while (i < mineCount) {
        let rand = Math.floor(Math.random() * slotNodes.length);
        if (!selectedIndices.has(rand)) {
            slotNodes[rand].classList.add("mina");
            selectedIndices.add(rand);
            i++;
        }
    }
    for (let index = 0; index < slotNodes.length; index++) {
        let mineCount = 0;
        if (slotNodes[index].classList.contains("mina")) continue;
        if (index % 10 != 0 && slotNodes[index - 1].classList.contains("mina")) mineCount++;
        if (index % 10 != 9 && slotNodes[index + 1].classList.contains("mina")) mineCount++;
        if (index < 90) {
            if (slotNodes[index + 10].classList.contains("mina")) mineCount++;
            if (index % 10 != 9 && slotNodes[index + 11].classList.contains("mina")) mineCount++;
            if (index % 10 != 0 && slotNodes[index + 9].classList.contains("mina")) mineCount++;
        }
        if (index >= 10) {
            if (slotNodes[index - 10].classList.contains("mina")) mineCount++;
            if (index % 10 != 9 && slotNodes[index - 9].classList.contains("mina")) mineCount++;
            if (index % 10 != 0 && slotNodes[index - 11].classList.contains("mina")) mineCount++;
        }
        if (mineCount == 1) slotNodes[index].classList.add("poco");
        if (mineCount == 2) slotNodes[index].classList.add("medio");
        if (mineCount >= 3) slotNodes[index].classList.add("mucho");
        if (mineCount > 0) slotNodes[index].textContent = mineCount;
    }
}