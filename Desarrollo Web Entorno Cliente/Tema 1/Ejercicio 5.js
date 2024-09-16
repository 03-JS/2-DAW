let edad = prompt("Introduce tu edad");
let ingresos = prompt("Introduce tus ingresos");

if (edad > 16 && ingresos >= 1000) {
    alert("Has de tributar");
} else {
    alert("No has de tributar");
}