let n1 = prompt("Introduce un número");
let n2 = prompt("Introduce otro número");

if (n2 == 0) {
    alert(`El divisor no puede ser 0!`);
} else {
    let resultado = n1 / n2;
    alert(`La división de los 2 números es igual a ${resultado}`);
}