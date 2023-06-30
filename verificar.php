<?php
// Obtener los datos del formulario
$username = $_POST['username'];  //$_POST: array que guarda los datos enviados por el formulario
$password = $_POST['password'];

// Conectarse a la base de datos
$servername = "localhost";
$db_username = "serveruser";
$db_password = "serveruser";
$db_name = "servidorppm";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para verificar el usuario y la contraseña en la base de datos
$sql = " SELECT * FROM usuarios WHERE username='$username' AND password='$password' ";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Usuario y contraseña son correctos, redirigir a la página de inicio
    header("Location: inicio.html");
} else {
    // Usuario y/o contraseña son incorrectos, redirigir a la página de error
    header("Location: error.html");
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
