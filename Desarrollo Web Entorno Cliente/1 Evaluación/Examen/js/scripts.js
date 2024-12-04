const gameObjects = ["piedra", "papel", "tijera", "lagarto", "spock"];
let items;
let points = 0;
let enemyPoints = 0;

document.addEventListener("DOMContentLoaded", () => {
    items = document.querySelectorAll(".item");
    CreateImages();
    selector.addEventListener("dblclick", (event) => {
        seleccionado.appendChild(event.target);
        PlayGame();
    });
    seleccionado.addEventListener("drop", DropHandler);
    seleccionado.addEventListener("dragover", (event) => event.preventDefault());
    continuar.addEventListener("click", Continue);
})

function DropHandler(event) {
    event.preventDefault();
    event.target.appendChild(document.querySelector(`#${event.dataTransfer.getData("text")}`));
    PlayGame();
}

function CreateImages() {
    for (let index = 0; index < items.length - 1; index++) { // -1 de la longitud para no pillar el item que contiene lo que hemos seleccionado
        if (items[index].childNodes.length <= 1) { // para solo rellenar los items que no tienen imágenes
            let element = document.createElement("img");
            element.src = `./img/${gameObjects[index]}.png`;
            element.id = gameObjects[index];
            element.addEventListener("dragstart", (event) => event.dataTransfer.setData("text", event.target.id));
            element.draggable = true;
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
    mensaje.classList.remove("invisible");
    mensaje.childNodes[3].innerText = str;
}

function PlayGame() {
    setTimeout(() => {
        proteccion.classList.remove("invisible");
        deliveracion.classList.remove("invisible");
        let enemyChoice = gameObjects[Math.floor(Math.random() * gameObjects.length)];
        let str = "";
        setTimeout(() => {
            switch (seleccionado.lastChild.id) {
                case "piedra":
                    if (enemyChoice == "tijera" || enemyChoice == "lagarto") {
                        points += 1;
                        AddPoints(1, "mio");
                        if (enemyChoice == "tijera") enemyChoice += "s"; // para que todos los mensajes de tijeras sean en plural. Sin la s este sería el único en singular
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
                    if (enemyChoice == "papel" || enemyChoice == "lagarto") {
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
    proteccion.classList.add("invisible");
    mensaje.classList.add("invisible");
    enemigo.childNodes[1].src = "./img/interrogante.png";
    CreateImages(); // lo vuelvo a llamar para que vuelva a poner las imágenes en el sitio que les corresponde
    seleccionado.removeChild(seleccionado.lastChild);
}