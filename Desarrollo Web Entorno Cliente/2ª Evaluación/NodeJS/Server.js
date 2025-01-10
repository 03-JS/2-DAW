// No express

// var http = require("http");

// var server = http.createServer();

// function mensaje(peticion, respuesta) {
//     respuesta.writeHead(200, {"Content-Type": "text/plain"});
//     respuesta.write("Hola mundo");
//     respuesta.end();
// }

// server.on("request", mensaje);

// server.listen(3000, function() {
//     console.log("La aplicación está funcionando en el puerto 3000");
// });


// Express

const express = require("express");

const app = express();

app.get("/hola", (req, res) => {
    res.send("Hello World!");
});

app.listen(3000, () => {
    console.log("Example app listening at http://localhost:" + 3000);
});