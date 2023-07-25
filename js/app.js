// app.js

// Importar el módulo 'express' para crear el servidor
const express = require('express');
// Crear una instancia de 'express' llamada 'app'
const app = express();
// Importar el módulo 'body-parser' para analizar el cuerpo de las solicitudes HTTP con formato JSON
const bodyParser = require('body-parser');
// Importar el módulo 'mysql' para conectar a la base de datos MySQL
const mysql = require('mysql');

// Configurar la conexión a la base de datos MySQL
const connection = mysql.createConnection({
  host: "localhost",       // Dirección del servidor de la base de datos
  user: "paloma",          // Nombre de usuario de la base de datos
  password: "paloma1234",  // Contraseña del usuario de la base de datos
  database: "servidorppm"  // Nombre de la base de datos que se utilizará
});

// Conectar a la base de datos
connection.connect(function(err) {
  if (err) {
    console.error("Error al conectar a la base de datos: ", err);
  } else {
    console.log("Conectado a la base de datos");
  }
});

// Middleware para analizar las solicitudes con cuerpo JSON
app.use(bodyParser.json());

// Ruta para comprobar los datos de inicio de sesión
app.post('/login', function(req, res) {
  // Extraer el nombre de usuario y contraseña enviados en la solicitud desde el cuerpo JSON
  const { username, password } = req.body;

  // Consulta para verificar si el usuario y la contraseña coinciden en la base de datos
  const query = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
  // Ejecutar la consulta con los datos proporcionados
  connection.query(query, [username, password], function(error, results) {
    if (error) {
      // Si hay un error en la consulta, enviar una respuesta con código de estado 500 (Error interno del servidor)
      console.error("Error al realizar la consulta: ", error);
      res.sendStatus(500);
    } else {
      // Si no hay error en la consulta:
      if (results.length > 0) {
        // Si la consulta devuelve resultados (es decir, las credenciales son correctas),
        // enviar una respuesta con código de estado 200 (Inicio de sesión exitoso)
        res.sendStatus(200);
      } else {
        // Si la consulta no devuelve resultados (es decir, las credenciales son incorrectas),
        // enviar una respuesta con código de estado 401 (No autorizado)
        res.sendStatus(401);
      }
    }
  });
});

// Iniciar el servidor en el puerto 3000
app.listen(3000, function() {
  console.log("Servidor backend escuchando en http://localhost:3000");
});


/** Resumen de lo que hace este archivo app.js:

    Importa los módulos necesarios (express, body-parser y mysql).
    Crea una conexión a la base de datos MySQL con las credenciales proporcionadas.
    Define un middleware utilizando body-parser para analizar las solicitudes HTTP con cuerpo JSON. Esto es necesario para poder extraer los datos enviados desde el formulario de inicio de sesión en el frontend.
    Define una ruta para la comprobación de datos de inicio de sesión usando el método POST. Cuando se reciba una solicitud POST en la ruta /login, el servidor extraerá el nombre de usuario y contraseña enviados en el cuerpo de la solicitud (req.body) y los utilizará para realizar una consulta en la base de datos para verificar si existen credenciales coincidentes.
    Si la consulta es exitosa y se encuentran credenciales coincidentes, el servidor enviará una respuesta con un código de estado 200 (Inicio de sesión exitoso).
    Si la consulta no encuentra credenciales coincidentes, el servidor enviará una respuesta con un código de estado 401 (No autorizado).
    Si ocurre algún error en la consulta a la base de datos, el servidor enviará una respuesta con un código de estado 500 (Error interno del servidor).
    El servidor se inicia en el puerto 3000 y muestra un mensaje en la consola indicando que el servidor está en funcionamiento.

    **