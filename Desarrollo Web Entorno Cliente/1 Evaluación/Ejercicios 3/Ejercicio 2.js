let adivina = (Math.random() * 1000) + 1;
adivina = Math.round(adivina);
console.log(adivina);
let input = 0;

while (input != adivina) {
    input = prompt("Has de adivinar un número entre el 1 y 1000");
    if (input < adivina) alert("El número introducido es menor!");
    else if (input != adivina) alert("El número introducido es mayor!");
    else alert("Has acertado!");
};