<?php

// Solicitar el nombre de usuario y contraseña para MariaDB
$user = readline("Ingresa el nombre de usuario de MariaDB con el que deseas ejecutar el .sql: ");

// Construir los comandos para ejecutar los archivos SQL
$createDbFile = __DIR__ . '/create_db.sql';
$insertTestFile = __DIR__ . '/insert_test.sql';

// Función para ejecutar comandos en shell
function execCommand($user, $archivoSQL) {
    // Escapamos los parámetros para evitar problemas de seguridad
    $user = escapeshellarg($user);
    $archivoSQL = escapeshellarg($archivoSQL);
    $command = "sudo mysql -u $user -p < $archivoSQL";
    shell_exec($command);
}

// Ejecutar el archivo de creación de base de datos
echo "Ejecutando archivo de creación de base de datos...\n";
execCommand($user, $createDbFile);

// Preguntar si se deben agregar usuarios de prueba
$test = readline('¿Quieres crear usuarios de prueba? (s/n): ');

if (strtolower($test) === 's') {
    echo "Ejecutando archivo de inserción de usuarios de prueba...\n";
    execCommand($user, $insertTestFile);
}

echo "Base de datos creada con éxito.\n";

echo "\n\nAsegurate que tu archivo '/etc/mysql/mariadb.conf.d/50-server.cnf', en la linea 'bind-address =' tenga asignada la IP desde la que te vas a conectar a la DB\n\n";

?>
