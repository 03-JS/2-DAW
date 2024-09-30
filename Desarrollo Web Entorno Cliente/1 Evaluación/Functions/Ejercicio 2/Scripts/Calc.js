const Suma = (n, n1) => n + n1;

const Resta = (n, n1) => n - n1;

const Divide = (n, n1) => [n / n1, n % n1];

const Multiplica = (n, n1) => n * n1;

function Main() {
    let n = Number.parseFloat(prompt("Introduce un número"));
    let n1 = Number.parseFloat(prompt("Introduce otro número"));
    let str = "1 - Sumar\n";
    str += "2 - Restar\n";
    str += "3 - Multiplicar\n";
    str += "4 - Dividir";
    let operacion = prompt(`Elige la operación a realizar:\n${str}`);
    switch (Number.parseFloat(operacion)) {
        case 1:
            let suma = Suma(n, n1);
            alert(`La suma de ${n} y ${n1} es igual a ${suma}`);
            break;
        case 2:
            let resta = Resta(n, n1);
            alert(`La resta de ${n} y ${n1} es igual a ${resta}`);
            break;
        case 3:
            let mult = Multiplica(n, n1);
            alert(`La multiplicación de ${n} y ${n1} es igual a ${mult}`);
            break;
        case 4:
            let res = Divide(n, n1);
            alert(`La división de ${n} y ${n1} es igual a ${res[0]}\nEl resto es ${res[1]}`);
            break;
        default:
            break;
    }
}

Main();