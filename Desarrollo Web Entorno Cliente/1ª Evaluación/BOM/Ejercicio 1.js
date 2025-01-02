window.addEventListener("load", () => {
    // let regex = /=(.*?)(?:&|$)/g;
    // console.log([...location.search.matchAll(regex)]);
    // let matches = [...location.search.matchAll(regex)].map(match => match[1]);
    // alert(`El usuario ${matches[0]} ${matches[1]}, tiene como dirección de correo electrónico, ${matches[2]}`);

    let search = new URLSearchParams(window.location.search);
    alert(`El usuario ${search.get("nombre")} ${search.get("apellidos")}, tiene como dirección de correo electrónico, ${search.get("correo")}`);
})