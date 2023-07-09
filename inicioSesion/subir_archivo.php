<?php
$carpeta_destino = '../datos/';  // Ruta a la carpeta destino

if (!empty($_FILES['archivo']['name'])) {                                           //verifica si el archivo ha sido seleccionado
  $archivo_destino = $carpeta_destino . basename($_FILES['archivo']['name']);       //lo mueve

  if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo_destino)) {
    echo 'El archivo se ha subido correctamente.';
  } else {
    echo 'Ha ocurrido un error al subir el archivo.';
  }
}

/** Si la función move_uploaded_file() devuelve false, significa que ha
 *  ocurrido un error al intentar mover el archivo */
?>
