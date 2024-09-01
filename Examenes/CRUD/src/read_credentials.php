<?php


function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception("El archivo .env no existe en la ruta especificada.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    

    foreach ($lines as $line) {
        // Omitir líneas de comentarios
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Separar la clave y el valor
        list($key, $value) = explode('=', $line, 2);

        // Eliminar espacios y comillas alrededor del valor
        $key = trim($key);
        $value = trim($value, " \t\n\r\0\x0B\"");

        // Establecer la variable en el entorno
        putenv("$key=$value");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}



// Llamar a la función para cargar las variables de entorno
loadEnv(__DIR__ . '/../.env');


?>