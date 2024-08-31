<?php


function loadEnv($path, $until) {
    if (!file_exists($path)) {
        throw new Exception("El archivo .env no existe en la ruta especificada.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    

    for ($i = 0; $i < $until; $i++) {
        // Omitir líneas de comentarios
        if (strpos(trim($lines[$i]), '#') === 0) {
            continue;
        }

        // Separar la clave y el valor
        list($key, $value) = explode('=', $lines[$i], 2);

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
loadEnv(__DIR__ . '/.env', 4);

// Ahora puedes acceder a las variables de entorno
$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');


?>