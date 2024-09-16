let nombre = prompt("¿Cómo te llamas?");
let sexo = prompt("Introduce tu sexo");

if ((sexo.toLowerCase() == "mujer" && sexo.charAt(0) < 'M') || (sexo.toLowerCase() == "hombre" && sexo.charAt(0) > 'N')) {
    alert("Perteneces al Grupo A");
} else {
    alert("Perteneces al Grupo B");
}