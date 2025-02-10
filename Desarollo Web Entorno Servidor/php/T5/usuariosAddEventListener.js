function leerDatos() {
    // Crear el objeto XMLHttpRequest
    let xhttp = new XMLHttpRequest();

    // Configurar qué hacer cuando cambie el estado de la solicitud
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            // Convertir el JSON recibido en un objeto
            const datosJSON = JSON.parse(this.responseText);

            // Seleccionar la lista en el DOM
            const lista = document.getElementById("lista");

            // Limpiar la lista (en caso de que se haga clic más de una vez)
            lista.innerHTML = "";

            // Iterar sobre los datos y agregarlos al DOM
            datosJSON.forEach(userInfo => {
                const listaItem = document.createElement("li");
                listaItem.textContent = `${userInfo.id} ${userInfo.name}`;
                lista.appendChild(listaItem);
            });
        }
    };

    // Abrir la solicitud al archivo JSON
    const url = "usuariosAddEventListener.json";
    xhttp.open("GET", url, true);

    // Enviar la solicitud
    xhttp.send();
}

// Añadimos escuchadores
document.getElementById("boton").addEventListener("click", leerDatos);