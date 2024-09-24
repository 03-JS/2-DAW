let input = prompt("Introduce una fecha en formato MM/DD/YYYY");
let date = new Date(input);
alert(date.toLocaleString("es-ES", {
    day: "numeric",
    month: "long",
    year: "numeric"
  }));