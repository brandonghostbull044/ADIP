<?php


$user = array_key_exists('PHP_AUTH_USER', $_SERVER) ? $_SERVER['PHP_AUTH_USER'] : '';
$password = array_key_exists('PHP_AUTH_PW', $_SERVER)? $_SERVER['PHP_AUTH_PW'] : '';

function auth($usr, $passwd) {
    if ($usr !== 'admin' || $passwd !== 'admin') {
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        echo "No tienes acceso a la API";
        die;
    }
}

if ( empty($password) || empty($user) ) {
    echo "\n\nFaltan las credenciales. Quieres ingresarlas, ingresalas por consola.\n";
    $user = readline("Usuario: ");
    $password = readline("Contraseña: ");
    auth($user, $password);
} else {
    auth($user, $password);
}


?>