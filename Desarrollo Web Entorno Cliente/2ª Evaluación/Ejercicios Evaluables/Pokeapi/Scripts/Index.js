let pokemonUrls;

document.addEventListener("DOMContentLoaded", () => {
    let limit;
    fetch("https://pokeapi.co/api/v2/pokemon/")
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            limit = data.count;
            return fetch(`https://pokeapi.co/api/v2/pokemon/?limit=${limit}`);
        })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            pokemonUrls = data.results.map((pokemon) => pokemon.url);
            console.log("Pokémon URLs:", pokemonUrls);


        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
});

function GenerateHands() {
    
}