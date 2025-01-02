const BRANDS = ["McLaren", "Ferrari", "Mercedes", "Alfa", "Toyota"];
const BASE_URL = "https://vpic.nhtsa.dot.gov/api/vehicles/getmodelsformake/";
const request = new XMLHttpRequest();

for (let brand of BRANDS) {
    request.open("GET", BASE_URL + brand);
    request.send();
}

request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == 200) {

    }
}