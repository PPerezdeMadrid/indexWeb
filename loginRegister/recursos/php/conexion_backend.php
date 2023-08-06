<?php
// Datos de conexión a la base de datos
$host = "localhost";
$database = "servidorPPM";
$username = "paloma_pml"; 
$password = "Paloma1234+"; 

// Conexión a la base de datos usando PDO (PHP Data Objects)
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $usernameInput = $_POST["username"];
    $passwordInput = $_POST["password"];

    // Consulta para verificar la existencia del usuario y contraseña en la tabla
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username AND password = :password");
    $stmt->execute([
        'username' => $usernameInput,
        'password' => $passwordInput
    ]);

    // Comprobar si se encontraron registros en la consulta
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        // Redireccionar a la página de inicio
        header("Location: ../inicio/Inicio.html");
        exit;
    } else {
        // Redireccionar a la página de error
        header("Location: error.html");
        exit;
    }
}
?>