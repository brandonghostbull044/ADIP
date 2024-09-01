<?php


$matche = [];

preg_match('/\/([^\/]+)?\/?([^\/]+)?/', $_SERVER["REQUEST_URI"], $matches);

if ($matches[1] == '') {
	require __DIR__ . '/../docs/one_server.doc.php';
} else {
	//Autenticacion
	if ( !array_key_exists( 'HTTP_X_TOKEN', $_SERVER ) ) {
		die('Necesitas un token de autenticaión.');
	}

	$url = 'http://localhost:8001';

	$ch = curl_init( $url );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, [
		"X-Token: {$_SERVER['HTTP_X_TOKEN']}",
	]);

	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	$ret = curl_exec( $ch );

	if ( curl_errno($ch) != 0 ) {
		die ( curl_error($ch) );
	}

	if ( $ret !== 'true' ) {
		echo 'No estas autorizado';
		http_response_code( 403 );
		die;
	}


	require __DIR__ . '/./router.php';
}



?>