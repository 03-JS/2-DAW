function obtenerInfo() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("etiqueta").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "frutasAddEventListener.txt", true);
    xhttp.send();
}

document.getElementById("lee").addEventListener("click", obtenerInfo, false);