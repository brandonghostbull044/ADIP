<?php


require __DIR__ . '/../src/basic_auth.php';

require __DIR__ . '/../src/db_connection.php';

$allowed_resources = ['usuarios'];

$matches = [];
preg_match('/\/([^\/]+)?\/?([^\/]+)?/', $_SERVER["REQUEST_URI"], $matches);

if ($matches[1] == '') {
    require __DIR__ . '/../docs/four_serves.doc.php';
} else {
    if ( !in_array($matches[1], $allowed_resources) || ($matches[2] != '' && !in_array($matches[2], $all_users_id)) ) {
        http_response_code(404);
        die("No se ha encontrado el recurso que buscas.");
    }
    
    
    $query = '';
    
    if ( empty($matches[2]) ) {
        $query = 'CALL ObtenerUsuarios()';
    } else {
        $query = "CALL ObtenerUsuarioPorID($matches[2])";
    }
    
    header('Content-Type: application/json');
    
    
    $stml = $pdo->prepare($query);
    $stml->execute();
    $results = $stml->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($results);
}


?>