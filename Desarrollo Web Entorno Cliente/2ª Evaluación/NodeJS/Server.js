const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');
// const mysql = require('mysql2');

const port = 3000;

// Declaramos la aplicación
const app = express()

// Configurar body-parser
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Serve static files from the "public" directory
app.use(express.static(path.join(__dirname, 'public')));

// Default route (optional, Express automatically serves index.html from 'public')
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

require("./routes/usuarios.routes.js")(app);

// Arrancamos el servidor
app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`)
});