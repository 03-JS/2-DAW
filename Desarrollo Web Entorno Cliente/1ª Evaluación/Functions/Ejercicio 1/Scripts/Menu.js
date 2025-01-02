// Menú

function EjecutarMenu() {
    let input;
    let str = "Opciones:\n";
    str += "1 - Introducir una fecha\n";
    str += "2 - Adivinar un número\n";
    str += "3 - Buscar vocales\n";
    str += "0 - Salir";
    do {
        alert(str);
        input = prompt("Elige una opción");
        console.log(input);
        switch (Number.parseInt(input)) {
            case 1:
                IntroducirFecha();
                break;
            case 2:
                AdivinarNum();
                break;
            case 3:
                DetectaVocales();
                break;
            default:
                break;
        }
    } while (input != 0);
}

EjecutarMenu();

// Funciones

function IntroducirFecha() {
    let input = prompt("Introduce una fecha en formato MM/DD/YYYY");
    let date = new Date(input);
    alert(date.toLocaleString("es-ES", {
        day: "numeric",
        month: "long",
        year: "numeric"
    }));
}

function AdivinarNum() {
    let adivina = (Math.random() * 1000) + 1;
    adivina = Math.round(adivina);
    console.log(adivina);
    let input;

    while (input != adivina) {
        input = prompt("Has de adivinar un número entre el 1 y 1000");
        if (input < adivina) alert("El número introducido es menor!");
        else if (input != adivina) alert("El número introducido es mayor!");
        else alert("Has acertado!");
    };
}

function DetectaVocales() {
    let regex = /[aeiou]/gi;
    let input;

    do {
        input = prompt("Introduce carácteres (espacio en blanco para salir)");
        if (input.match(regex)) alert("VOCAL");
        else if (typeof input != Number && (input != "" && input != " ")) alert("NO VOCAL");
    } while (input != " " && input != "");
}