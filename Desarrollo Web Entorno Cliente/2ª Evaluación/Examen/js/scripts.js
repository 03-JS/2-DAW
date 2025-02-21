// Array que contiene los Pokémon disponibles
let pokemons = [];
let slots;
let slotIndex = 0;
let timeout;
let members;
let freeTeamSlots = 3;  // Espacios disponibles en el equipo
let takenTeamSlots = 0; // Espacios ocupados en el equipo
let intentos = 5; // Número de intentos disponibles para seleccionar un Pokémon

// Esperamos a que el contenido del DOM se cargue completamente
document.addEventListener("DOMContentLoaded", async () => {
    selector.disabled = true; // Desactivamos el botón de selección al inicio
    slots = document.querySelectorAll(".casilla"); // Obtenemos las casillas donde se mostrarán los Pokémon
    members = document.querySelectorAll(".miembro"); // Obtenemos las casillas del equipo donde se colocarán los Pokémon

    // Generamos los Pokémon aleatorios
    await GetPokemon();
    SetPokemon();

    // Asociamos eventos a los botones
    lanzador.addEventListener("click", Spin);  // Evento para lanzar el giro
    selector.addEventListener("click", SelectPokemon);  // Evento para seleccionar un Pokémon
});

// Función que obtiene Pokémon aleatorios de la API de Pokémon
async function GetPokemon() {
    const promises = [];
    let usedNumbers = new Set(); // Para evitar repetir números aleatorios

    // Cargamos 8 Pokémon aleatorios
    for (let index = 0; index < 8; index++) {
        let randomInt;

        // Generamos un número aleatorio y aseguramos que no se repita
        do {
            randomInt = Math.floor(Math.random() * 1024);
        } while (usedNumbers.has(randomInt));

        usedNumbers.add(randomInt);

        // Realizamos una solicitud a la API de Pokémon para obtener la información del Pokémon
        let fetchPromise = fetch(`https://pokeapi.co/api/v2/pokemon/${randomInt + 1}`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                let pokemon = {
                    "name": data.name,
                    "height": data.height,
                    "src": data.sprites.other["official-artwork"]["front_default"]
                }
                pokemons[index] = pokemon;  // Almacenamos el Pokémon
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
        promises.push(fetchPromise);
    }

    // Esperamos a que todas las solicitudes se completen
    await Promise.all(promises);
}

// Función que coloca los Pokémon en las casillas del juego
function SetPokemon() {
    // Mostramos los Pokémon en las casillas correspondientes
    for (let index = 0; index < pokemons.length; index++) {
        let img = document.createElement("img");
        img.src = pokemons[index].src;  // Establecemos la imagen del Pokémon
        slots[index].appendChild(img);  // Colocamos la imagen en la casilla correspondiente
    }
}

// Función que inicia el proceso de giro al hacer clic en el botón "Lanzador"
function Spin() {
    if (freeTeamSlots == 0 || intentos == 0 || lanzador.disabled) return;  // Verificamos si se pueden hacer más giros
    selector.disabled = true;  // Desactivamos el botón "Selector"
    AutoSpin();  // Iniciamos el giro de forma automática
    intentos--;  // Decrementamos los intentos
    if (intentos == freeTeamSlots) contadorIntentos.classList.add("alert");  // Añadimos una alerta si los intentos restantes coinciden con los espacios libres
    contadorIntentos.innerHTML = `Intentos: ${intentos}`;  // Actualizamos el contador de intentos
}

// Función que realiza el giro de forma automática
function AutoSpin() {
    lanzador.disabled = true;  // Desactivamos el botón "Lanzador" durante el giro
    let delay = 50;  // Tiempo entre cada cambio de casilla
    let spins = 0;  // Contador de giros
    let maxSpins = Math.floor(Math.random() * (20 - 12 + 1)) + 12;  // Número aleatorio de giros entre 12 y 20
    console.log(`Giros: ${maxSpins}`);  // Mostramos el número máximo de giros
    timeout = setTimeout(() => ChangeSlot(spins, maxSpins, delay), delay);
}

// Función que cambia la casilla seleccionada durante el giro
function ChangeSlot(spins, maxSpins, delay) {
    slots[slotIndex].classList.remove("seleccionada");  // Eliminamos la clase "seleccionada" de la casilla anterior
    slotIndex = (slotIndex < 7) ? slotIndex + 1 : 0;  // Seleccionamos la siguiente casilla, o volvemos al inicio
    slots[slotIndex].classList.add("seleccionada");  // Añadimos la clase "seleccionada" a la nueva casilla
    spins++;  // Aumentamos el contador de giros
    centro.innerHTML = "";  // Limpiamos el centro de la pantalla
    let img = slots[slotIndex].querySelector("img").cloneNode(true);  // Clonamos la imagen del Pokémon en la casilla seleccionada
    centro.appendChild(img);  // Añadimos la imagen al centro de la pantalla
    let cartel = document.createElement("div");
    cartel.classList.add("cartel");
    centro.appendChild(cartel);
    let nombre = document.createElement("div");
    nombre.id = "nombre";
    nombre.innerHTML = pokemons[slotIndex]["name"];
    cartel.appendChild(nombre);
    let altura = document.createElement("div");
    altura.id = "altura";
    altura.innerHTML = pokemons[slotIndex]["height"];
    cartel.appendChild(altura);
    delay += 50;  // Aumentamos el retraso entre giros
    if (spins == maxSpins) {  // Si hemos alcanzado el número máximo de giros
        if (slots[slotIndex].querySelector(".esMiembro")) {  // Si el Pokémon ya está en el equipo, hacemos un nuevo giro
            AutoSpin();
            return;
        }
        selector.disabled = false;  // Habilitamos el botón "Selector"
        lanzador.disabled = false;  // Habilitamos el botón "Lanzador"
        if (intentos + 1 == freeTeamSlots) SelectPokemon();  // Si los intentos restantes coinciden con los espacios libres, seleccionamos automáticamente
        clearTimeout(timeout);  // Detenemos el temporizador
        return;
    }
    timeout = setTimeout(() => ChangeSlot(spins, maxSpins, delay), delay);  // Continuamos el giro
}

// Función que selecciona un Pokémon y lo agrega al equipo
function SelectPokemon() {
    if (selector.disabled) return;  // Si el botón "Selector" está desactivado, no hacemos nada
    let img = centro.querySelector("img").cloneNode(true);  // Clonamos la imagen del Pokémon seleccionado
    let cartel = centro.querySelector(".cartel").cloneNode(true);  // Clonamos el cartel con la información del Pokémon
    members[takenTeamSlots].appendChild(img);  // Añadimos la imagen al slot del equipo
    members[takenTeamSlots].appendChild(cartel);  // Añadimos el cartel al slot del equipo
    let X = document.createElement("div");
    X.innerHTML = "X";  // Marcamos el Pokémon como miembro
    X.classList.add("esMiembro");
    slots[slotIndex].appendChild(X);  // Añadimos la marca en la casilla
    takenTeamSlots++;  // Aumentamos el contador de slots ocupados
    freeTeamSlots--;  // Disminuimos el contador de slots libres
    selector.disabled = true;  // Desactivamos el botón "Selector"
    if (intentos == 0) lanzador.disabled = true;  // Si no quedan intentos, desactivamos el botón "Lanzador"
}
