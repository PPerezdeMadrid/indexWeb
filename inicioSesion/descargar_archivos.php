<?php
if(isset($_GET['archivo'])) {
    // Obtiene el nombre del archivo desde la URL
    $archivo = $_GET['archivo'];

    // Ruta del directorio donde se encuentran los archivos
    $directorio = 'datos/';

    // Verifica si el archivo existe y es legible
    if(file_exists($directorio . $archivo) && is_readable($directorio . $archivo)) {
        // Configura las cabeceras para la descarga del archivo
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $archivo);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($directorio . $archivo));
        readfile($directorio . $archivo);
        exit;
    } else {
        echo 'El archivo solicitado no existe.';
    }
}
?>
