let items;
const gameObjects = ["piedra", "papel", "tijera", "lagarto", "spock"];
let points = 0;
let enemyPoints = 0;

document.addEventListener("DOMContentLoaded", () => {
    items = document.querySelectorAll(".item");
    LoadImgs();
    selector.addEventListener("dblclick", (event) => {
        seleccionado.appendChild(event.target);
        ProcessGameRules();
    });
    continuar.addEventListener("click", Continue);
})

function LoadImgs() {
    for (let index = 0; index < items.length - 1; index++) {
        if (items[index].childNodes.length <= 1) {
            let element = document.createElement("img");
            element.src = `./img/${gameObjects[index]}.png`;
            element.id = gameObjects[index];
            items[index].appendChild(element);
        }
    }
}

function AddPoints(points, className) {
    for (let index = 0; index < points; index++) {
        let point = document.createElement("div");
        point.classList.add("punto", className);
        className == "mio" ? yo.appendChild(point) : el.appendChild(point);
    }
}

function DisplayMessage(str) {
    deliveracion.classList.add("invisible");
    deliveracion.classList.remove("visible");
    mensaje.classList.remove("invisible");
    mensaje.classList.add("visible");
    mensaje.childNodes[3].innerText = str;
}

function ProcessGameRules() {
    setTimeout(() => {
        proteccion.classList.remove("invisible");
        proteccion.classList.add("visible");
        deliveracion.classList.remove("invisible");
        deliveracion.classList.add("visible");
        let enemyChoice = gameObjects[Math.floor(Math.random() * gameObjects.length)];
        let str = "";
        setTimeout(() => {
            switch (seleccionado.lastChild.id) {
                case "piedra":
                    if (enemyChoice == "tijera" || enemyChoice == "lagarto") {
                        points += 1;
                        AddPoints(1, "mio");
                        if (enemyChoice == "tijera") enemyChoice += "s";
                        str = "Piedra aplasta " + enemyChoice;
                    }
                    if (enemyChoice == "piedra") {
                        str = "¡Empate!";
                    }
                    if (enemyChoice == "papel") {
                        enemyPoints += 2;
                        AddPoints(2, "suyo");
                        str = "Papel tapa piedra";
                    }
                    if (enemyChoice == "spock") {
                        enemyPoints += 5;
                        AddPoints(5, "suyo");
                        str = "Spock vaporiza piedra";
                    }
                    break;
                case "papel":
                    if (enemyChoice == "piedra" || enemyChoice == "spock") {
                        points += 2;
                        AddPoints(2, "mio");
                        enemyChoice == "spock" ? str = "Papel desautoriza a Spock" : str = "Papel tapa piedra";
                    }
                    if (enemyChoice == "papel") {
                        str = "¡Empate!";
                    }
                    if (enemyChoice == "tijera") {
                        enemyPoints += 3;
                        AddPoints(3, "suyo");
                        str = "Tijeras cortan papel";
                    }
                    if (enemyChoice == "lagarto") {
                        enemyPoints += 4;
                        AddPoints(4, "suyo");
                        str = "Lagarto devora papel";
                    }
                    break;
                case "tijera":
                    if (enemyChoice == "papel" || enemyChoice == "laagrto") {
                        points += 3;
                        AddPoints(3, "mio");
                        enemyChoice == "papel" ? str = "Tijeras cortan papel" : str = "Tijeras decapitan lagarto";
                    }
                    if (enemyChoice == "tijera") {
                        str = "¡Empate!";
                    }
                    if (enemyChoice == "piedra") {
                        enemyPoints += 1;
                        AddPoints(1, "suyo");
                        str = "Piedra aplasta tijeras";
                    }
                    if (enemyChoice == "spock") {
                        enemyPoints += 5;
                        AddPoints(5, "suyo");
                        str = "Spock rompe tijeras";
                    }
                    break;
                case "lagarto":
                    if (enemyChoice == "spock" || enemyChoice == "papel") {
                        points += 4;
                        AddPoints(4, "mio");
                        enemyChoice == "spock" ? str = "Lagarto envenena a Spock" : str = "Lagarto devora papel";
                    }
                    if (enemyChoice == "lagarto") {
                        str = "¡Empate!";
                    }
                    if (enemyChoice == "piedra") {
                        enemyPoints += 1;
                        AddPoints(1, "suyo");
                        str = "Piedra aplasta lagarto";
                    }
                    if (enemyChoice == "tijera") {
                        enemyPoints += 3;
                        AddPoints(3, "suyo");
                        str = "Tijeras decapitan lagarto";
                    }
                    break;
                case "spock":
                    if (enemyChoice == "tijera" || enemyChoice == "piedra") {
                        points += 5;
                        AddPoints(5, "mio");
                        enemyChoice == "tijera" ? str = "Spock rompe tijeras" : str = "Spock vaporiza piedra";
                    }
                    if (enemyChoice == "spock") {
                        str = "¡Empate!";
                    }
                    if (enemyChoice == "lagarto") {
                        enemyPoints += 4;
                        AddPoints(4, "suyo");
                        str = "Lagarto envenena a Spock";
                    }
                    if (enemyChoice == "papel") {
                        enemyPoints += 2;
                        AddPoints(2, "suyo");
                        str = "Papel desautoriza a Spock";
                    }
                    break;
            }
            enemigo.childNodes[1].src = `./img/${enemyChoice}.png`;
            if (points >= 10) str = "¡Has ganado!";
            if (enemyPoints >= 10) str = "¡Has perdido!";
            DisplayMessage(str);
        }, 2000);
    }, 500);
}

function Continue() {
    if (points >= 10 || enemyPoints >= 10) {
        while (yo.firstChild) {
            yo.removeChild(yo.firstChild);
        }
        while (el.firstChild) {
            el.removeChild(el.firstChild);
        }
        points = 0;
        enemyPoints = 0;
    }
    proteccion.classList.remove("visible");
    proteccion.classList.add("invisible");
    mensaje.classList.remove("visible");
    mensaje.classList.add("invisible");
    enemigo.childNodes[1].src = "./img/interrogante.png";
    LoadImgs();
    seleccionado.removeChild(seleccionado.lastChild);
}