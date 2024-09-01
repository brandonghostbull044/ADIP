<?php


$api_user = getenv('API_USER');
$api_pass = getenv('API_PASS');

$user = array_key_exists('PHP_AUTH_USER', $_SERVER) ? $_SERVER['PHP_AUTH_USER'] : '';
$password = array_key_exists('PHP_AUTH_PW', $_SERVER)? $_SERVER['PHP_AUTH_PW'] : '';

function auth($usr, $passwd, $api_user, $api_pass) {
    if ($usr !== $api_user || $passwd !== $api_pass) {
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        echo "No tienes acceso a la API";
        die;
    }
}

if ( empty($password) || empty($user) ) {
    die("\n\nFaltan las credenciales. Ingresalas por consola.\n");
} else {
    auth($user, $password, $api_user, $api_pass);
}


?>