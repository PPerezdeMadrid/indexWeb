<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES["file"]["name"];
        $rutaTemporal = $_FILES["file"]["tmp_name"];
        $carpetaDestino = "archivos/";

        // Comprobamos si la carpeta de destino existe, si no, la creamos
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino, 0755, true);
        }

        $rutaCompleta = $carpetaDestino . $nombreArchivo;

        // Movemos el archivo de la ruta temporal a la carpeta de destino
        if (move_uploaded_file($rutaTemporal, $rutaCompleta)) {
            echo "Archivo subido correctamente.";
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "Error al subir el archivo.";
    }
}
?>

