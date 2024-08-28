<?php



//Lectura de la clave secreta
$secret_key = file_get_contents('./resources/secret_key.txt');

//Autenticacion via HMAC
$hash = null;
$timestamp = null;
$uid = null;

if (
    !array_key_exists('HTTP_X_HASH', $_SERVER) ||
    !array_key_exists('HTTP_X_TIMESTAMP', $_SERVER) ||
    !array_key_exists('HTTP_X_UID', $_SERVER)
) {
    header('WWW-Authenticate: HMAC realm="Area restringida"');
    die("No tienes acceso a la API");
} else {
    $hash = $_SERVER['HTTP_X_HASH'];
    $timestamp = $_SERVER['HTTP_X_TIMESTAMP'];
    $uid = $_SERVER['HTTP_X_UID'];
}

$new_hash = sha1($uid.$timestamp.$secret_key);

if ($hash!== $new_hash) {
    header('WWW-Authenticate: HMAC realm="Acceso denegado"');
    die("Acceso denegado");
}



//Declaracion de recursos
$resources = [
    'patients' => [
        1 => null
    ]
];



//Declaracion de recursos permitidos
$allowed_resources = array_keys($resources);



//Validacion de la peticion
$resource_type = $_GET['resource_type'];
$resource_id = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';
$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'GET') {
    die('Solo se permite el método GET.');
}

if (!in_array($resource_type, $allowed_resources)) {
    http_response_code(404);
    die('No se ha encontrado el recurso que buscas.');
} elseif (!empty($resource_id) && !in_array($resource_id, array_keys($resources[$resource_type]))) {
    http_response_code(404);
    die('No se ha encontrado el recurso con el ID especificado.');
} else {
    http_response_code(200); // OK
    header('Content-Type: application/json');
}



//Ejecucion de la peticion a la API de la ADIP
require './src/background_api.php';
$resources[$resource_type][1] = $data;



//Devolucion del resultado
if (empty($resource_id)) {
    print_r(json_encode($resources[$resource_type]));
} else {
    print_r(json_encode($resources[$resource_type][$resource_id]));
}


?>