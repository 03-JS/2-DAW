const express = require('express');
const bodyParser = require('body-parser');
// const mysql = require('mysql2');

const port = 3000;

//Declaramos la aplicación
const app = express()
require("./routes/usuarios.routes.js")(app);

// Configurar body-parser
app.use(bodyParser.json());

//Arrancamos el servidor
app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`)
});