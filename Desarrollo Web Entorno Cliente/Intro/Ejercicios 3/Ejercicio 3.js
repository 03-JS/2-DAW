let regex = /^[aeiou]$/i;
let input;

do {
    input = prompt("Introduce carácteres");
    if (input.match(regex)) alert("VOCAL");
    else if (typeof input != Number && (input != "" && input != " ")) alert("NO VOCAL");
} while (input != " " && input != "");