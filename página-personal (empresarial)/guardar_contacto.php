<?php
// Ruta para guardar los datos
$rutaArchivo = "//Volumes/Macintosh HD/Tecmi Trabajos/Tercer Semestre/Full Stack/página-personal (empresarial)/contactos.txt";

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Crear el contenido a guardar
    $contenido = "Nombre: $nombre\nCorreo: $correo\nMensaje: $mensaje\n---\n";

     // Guardar los datos en el archivo
     if (file_put_contents($rutaArchivo, $contenido, FILE_APPEND | LOCK_EX) !== false) {
        // Redirigir a la misma página después de 2 segundos
        header("Refresh: 2; URL=http://localhost:8000/index.html");  // Asegúrate de poner la URL correcta
        echo "¡Información guardada exitosamente! Redirigiendo...";
        exit; // Detiene el script para evitar que se muestre algo más después de la redirección.
    } else {
        echo "Error: No se pudo guardar la información en el archivo.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
