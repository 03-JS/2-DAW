function categorias() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Crear la lista <ul>
            var lista = document.createElement("ul");

            // Convertir la respuesta JSON a un array de objetos
            var cats = JSON.parse(this.response);

            // Iterar sobre cada elemento del array
            for (var i = 0; i < cats.length; i++) {
                // Crear un elemento <li> para cada categoría
                var elem = document.createElement("li");
                elem.innerHTML = cats[i].nombre; // Acceder a la propiedad "nombre" del objeto

                // Añadir el elemento <li> a la lista <ul>
                lista.appendChild(elem);
            }

            // Obtener el elemento donde se va a mostrar la lista (asumo que tienes un elemento con id "principal")
            var body = document.getElementById("principal");

            // Limpiar el contenido anterior de "principal" (si lo hay)
            body.innerHTML = "";

            // Añadir la lista <ul> al elemento "principal"
            body.appendChild(lista);
        }
    };

    xhttp.open("GET", "ajax_categoriasJSONdatos.php", true);
    xhttp.send();

    return false; // Evitar que se siga el enlace (si se llama desde un enlace <a>)
}