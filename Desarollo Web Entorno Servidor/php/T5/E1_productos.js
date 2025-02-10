function leer_datos() {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const productos = JSON.parse(this.responseText);
            const tabla = crearTablaProductos(productos);
            document.getElementById("contenido").innerHTML = ""; // Limpiar contenido previo
            document.getElementById("contenido").appendChild(tabla);
        }
    };
    xhttp.open("GET", "E1_productos.json", true);
    xhttp.send();
}

function crear_fila(datos, tipo) {
    const fila = document.createElement("tr");
    for (const dato in datos) {
        const celda = document.createElement(tipo);
        celda.textContent = datos[dato];
        fila.appendChild(celda);
    }
    return fila;
}

function crearTablaProductos(productos) {
    const tabla = document.createElement("table");

    // Crear encabezado de la tabla
    const encabezado = ["Código", "Nombre", "Descripción", "Stock"];
    const filaEncabezado = crear_fila(encabezado, "th");
    tabla.appendChild(filaEncabezado);

    // Crear filas de datos
    productos.forEach(producto => {
        const filaProducto = crear_fila(producto, "td");
        tabla.appendChild(filaProducto);
    });

    return tabla;
}

document.getElementById("boton").addEventListener("click", leer_datos);