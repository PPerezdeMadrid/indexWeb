<?php
// Obtener los datos del formulario
$username = $_POST['username'];
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
$sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Usuario y contraseña son correctos, redirigir a la página de inicio
    header("Location: inicioSesion/inicio.html");
    exit;
} else {
    // Usuario y/o contraseña son incorrectos, redirigir a la página de error
    header("Location: inicioSesion/error.html");
    exit;
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conn->close();
?>

