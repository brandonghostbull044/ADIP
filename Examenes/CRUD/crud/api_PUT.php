<?php


require __DIR__ . '/../src/basic_auth.php';

require __DIR__ . '/../src/db_connection.php';


$allowed_resources = ['usuarios'];

global $matches;

if ( !in_array($matches[1], $allowed_resources) ) {
    http_response_code(404);
    die("No se ha encontrado el recurso que buscas.");
} elseif ( empty($matches[2]) ) {
    http_response_code(404);
    die("Debes especificar el id del user");
} elseif ( !in_array($matches[2], $all_users_id) ) {
    http_response_code(404);
    die("El id de usuario no existe");
}

$json = json_decode(file_get_contents('php://input'), true);
$id = $matches[2];
$nombre = $json['nombre'] != '' ? $json['nombre'] : '';
$edad = $json['edad'] != '' ? $json['edad'] : '';
$correo = $json['correo'] != '' ? $json['correo'] : '';


header('Content-Type: application/json');


$query = "CALL ActualizarRegistro($id, '$nombre', $edad, '$correo')";
$stml = $pdo->prepare($query);
$stml->execute();

echo "\n\nUsuario actualizado de manera exitosa\n";


?>