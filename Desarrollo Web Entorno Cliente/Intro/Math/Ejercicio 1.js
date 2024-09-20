/*
Legible version

let diam = prompt("Introduce el diámetro de una circunferencia");
let area = Math.PI * (diam / 2);
alert(`El área de la circunferencia es ${area.toFixed(2)} m2`);

*/

// Compact version
alert(`El área de la circunferencia es ${(Math.PI * (prompt("Introduce el diámetro de una circunferencia") / 2)).toFixed(2)} m2`);