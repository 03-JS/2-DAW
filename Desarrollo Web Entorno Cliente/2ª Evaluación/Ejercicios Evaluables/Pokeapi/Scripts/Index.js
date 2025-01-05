// let pokemonUrls;
let limit = 1024;
let machineHand = [];
let machineCard;
let machineMoved;
let playerHand = [];
let playerCard;
let playerMoved;

document.addEventListener("DOMContentLoaded", async () => {
    await GenerateHands();
    machineHand.sort((a, b) => a["Experience"] - b["Experience"]);
    DisplayMessage("Cargando", true);
    setTimeout(RandomlySetTurn, 3000);
});

async function GenerateHands() {
    const machinePromises = [];

    // Machine cards
    for (let index = 0; index < 5; index++) {
        let randomInt = Math.floor(Math.random() * limit);
        let fetchPromise = fetch(`https://pokeapi.co/api/v2/pokemon/${randomInt + 1}`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                let stats = {
                    "Name": data.name.charAt(0).toUpperCase() + data.name.slice(1),
                    "Experience": data.base_experience,
                    "Artwork": data.sprites.other["official-artwork"].front_default
                };
                machineHand.push(stats);
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
        let card = document.createElement("div");
        card.classList.add("machine", "card");
        let topText = document.createElement("span");
        topText.textContent = "Pokémon Experience";
        let pokeball = document.createElement("img");
        pokeball.src = "./Media/Pictures/Poké_Ball_icon.png";
        pokeball.classList.add("card-img");
        let bottomText = document.createElement("span");
        bottomText.textContent = "Battle";
        card.appendChild(topText);
        card.appendChild(pokeball);
        card.appendChild(bottomText);
        tableroMachine.appendChild(card);
        machinePromises.push(fetchPromise);
    }

    // Player cards
    for (let index = 0; index < 5; index++) {
        let randomInt = Math.floor(Math.random() * limit);
        fetch(`https://pokeapi.co/api/v2/pokemon/${randomInt}`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                let card = document.createElement("div");
                card.classList.add("card");
                let xp = document.createElement("div");
                xp.textContent = data.base_experience;
                xp.classList.add("xp-number");
                let pokemon = document.createElement("img");
                pokemon.src = data.sprites.other["official-artwork"].front_default;
                pokemon.classList.add("card-img");
                let name = document.createElement("div");
                name.textContent = data.name.charAt(0).toUpperCase() + data.name.slice(1);
                name.classList.add("card-name");
                card.appendChild(xp);
                card.appendChild(pokemon);
                card.appendChild(name);
                card.addEventListener("click", (event) => {
                    if (playerMoved) return;
                    jugadaPlayer.appendChild(event.currentTarget);
                    playerMoved = true;
                    if (tableroPlayer.querySelectorAll(".card").length == 0) DisplayMessage("¡Has ganado!");
                    if (!machineMoved) {
                        StartCounterPlay();
                    }
                    else {
                        setTimeout(() => DisplayMessage("Deliverando", true), 1500);
                        setTimeout(DistributePoints, 3000);
                    }
                    turn = 0;
                    turnIndicator.innerHTML = "Turno de la IA";
                });
                tableroPlayer.appendChild(card);
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
    }
    await Promise.all(machinePromises);
}

function RandomlySetTurn() {
    hiddenDisplay.classList.add("hidden");
    if (Math.floor(Math.random() * 2)) {
        turn = 1;
        turnIndicator.innerHTML = "Tu turno";
        return;
    }
    turnIndicator.innerHTML = "Turno de la IA";
    setTimeout(() => {
        CreateMachineCard();
        turn = 1;
        turnIndicator.innerHTML = "Tu turno";
    }, 1500);
}

function StartCounterPlay() {
    setTimeout(() => {
        let playerPokemonXp = jugadaPlayer.querySelector(".xp-number").textContent;
        let selectedCard;
        for (let index = 0; index < machineHand.length; index++) {
            if (playerPokemonXp < machineHand[index]["Experience"]) {
                selectedCard = machineHand[index];
                break;
            }
            if (playerPokemonXp == machineHand[index]["Experience"]) {
                if (parseInt(totalMachine.textContent) + playerPokemonXp >= 1000 || machineHand.length == 1) {
                    selectedCard = machineHand[index];
                    break;
                }
            }
            selectedCard = machineHand[0];
        }
        CreateMachineCard(selectedCard);
        turn = 1;
        turnIndicator.innerHTML = "Tu turno";
    }, 3000);
}

function CreateMachineCard(selectedCard = machineHand[Math.floor(Math.random() * machineHand.length)]) {
    tableroMachine.querySelectorAll(".machine")[0].remove();
    let card = document.createElement("div");
    card.classList.add("opponent", "card");
    let xp = document.createElement("div");
    xp.textContent = selectedCard["Experience"];
    xp.classList.add("xp-number");
    let pokemon = document.createElement("img");
    pokemon.src = selectedCard["Artwork"];
    pokemon.classList.add("card-img");
    let name = document.createElement("div");
    name.textContent = selectedCard["Name"];
    name.classList.add("card-name");
    card.appendChild(xp);
    card.appendChild(pokemon);
    card.appendChild(name);
    jugadaMachine.appendChild(card);
    machineHand.splice(machineHand.indexOf(selectedCard), 1);
    machineMoved = true;
    if (playerMoved) {
        setTimeout(() => DisplayMessage("Deliverando", true), 1500);
        setTimeout(DistributePoints, 3000);
    }
}

function DistributePoints() {
    hiddenDisplay.classList.add("hidden");
    let playerXp = parseInt(jugadaPlayer.querySelector(".xp-number").innerText);
    let machineXp = parseInt(jugadaMachine.querySelector(".xp-number").innerText);
    if (playerXp > machineXp) {
        totalPlayer.innerHTML = parseInt(totalPlayer.innerText) + playerXp + machineXp;
        for (const card of tablero.querySelectorAll(".card")) {
            cartasPlayer.appendChild(card);
        }
    } else if (playerXp < machineXp) {
        totalMachine.innerHTML = parseInt(totalMachine.innerText) + playerXp + machineXp;
        for (const card of tablero.querySelectorAll(".card")) {
            cartasMachine.appendChild(card);
        }
    } else {
        totalMachine.innerHTML = playerXp;
        totalPlayer.innerHTML = machineXp;
        cartasMachine.appendChild(jugadaPlayer.querySelector(".card"));
        cartasPlayer.appendChild(jugadaMachine.querySelector(".card"));
    }
    if (totalMachine.innerHTML >= 1000 || totalPlayer.innerHTML >= 1000) {
        totalMachine.innerHTML >= 1000 ? DisplayMessage("¡Ha ganado la IA!", false) : DisplayMessage("¡Has ganado!", false);
        setTimeout(window.location.reload, 3000);
    }
    machineMoved = false;
    playerMoved = false;
    if (turn == 0) {
        CreateMachineCard()
        setTimeout(() => {
            turn = 1;
            turnIndicator.innerHTML = "Tu turno";
        }, 3000);
    };
}

function DisplayMessage(message, showImg) {
    hiddenDisplay.classList.remove("hidden");
    showImg ? hiddenDisplay.querySelector("img").classList.remove("hidden") : hiddenDisplay.querySelector("img").classList.add("hidden");
    hiddenDisplay.querySelector("span").innerHTML = message;
}