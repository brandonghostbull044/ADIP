<?php



$method = strtoupper( $_SERVER['REQUEST_METHOD'] );
$auth_secret = getenv('AUTH_SECRET');
$auth_id = getenv('AUTH_ID');
$token = sha1(getenv('AUTH_SECRET'));

if ( $method === 'POST' ) {
    if ( !array_key_exists( 'HTTP_X_CLIENT_ID', $_SERVER ) || !array_key_exists( 'HTTP_X_SECRET', $_SERVER ) ) {
        http_response_code( 400 );

        die( 'Faltan parametros' );
    }

    $clientId = $_SERVER['HTTP_X_CLIENT_ID'];
    $secret = $_SERVER['HTTP_X_SECRET'];

    if ( $clientId !== $auth_id || $secret !== $auth_secret ) {
        http_response_code( 403 );
        echo 'SECRETO' . $auth_secret . ' secretoU' . ' IdU' . $clientId . ' ID' . $auth_id;

        die ( "No autorizado");
    }

    echo "Token de autenticacion: $token";

} elseif ( $method === 'GET' ) {
    if ( !array_key_exists( 'HTTP_X_TOKEN', $_SERVER ) ) {
        http_response_code( 400 );

        die ( 'Faltan parametros' );
    }

    if ( $_SERVER['HTTP_X_TOKEN'] == $token ) {
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}



?>