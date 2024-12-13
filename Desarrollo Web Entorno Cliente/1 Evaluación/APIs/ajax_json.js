let json;
let grid;

document.addEventListener("DOMContentLoaded", () => {
    grid = document.querySelector(".grid");
});

let request = new XMLHttpRequest();
request.addEventListener("readystatechange", () => {
    if (request.readyState == 4 && request.status == 200) {
        json = JSON.parse(request.responseText);
        json = json.results.sort((a, b) => a.distrito.localeCompare(b.distrito));
        CreateGridElements();
    }
});
request.open("GET", "https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/precio-de-compra-en-idealista/records?limit=88");
request.send();

function CreateGridElements() {
    for (let obj of json) {
        if (obj.precio_2022_euros_m2 == null || obj.precio_2010_euros_m2 == null || obj.distrito == null || obj.barrio == null || obj.max_historico_euros_m2 == null || obj.ano_max_hist == null) continue;
        let priceChange = obj.precio_2022_euros_m2 - obj.precio_2010_euros_m2;
        let arrow = priceChange > 0 ? "<div class='green arrow'>&uarr;</div>" : "<div class='red arrow'>&darr;</div>";
        let str = `Distrito: ${obj.distrito}<br>
        Barrio: ${obj.barrio}<br>
        Precio m2 2022: ${obj.precio_2022_euros_m2}€<br>
        Precio m2 2010: ${obj.precio_2010_euros_m2}€<br>
        ${arrow}
        Precio m2 máximo histórico: ${obj.max_historico_euros_m2}€, en el año ${obj.ano_max_hist}`;
        let element = document.createElement("div");
        element.classList.add("grid-item");
        element.innerHTML = str;
        grid.appendChild(element);
    }
}