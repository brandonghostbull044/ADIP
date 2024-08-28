<?php


$matches = [];

if (preg_match('/\/([^\/]+)\/([^\/]+)/', $_SERVER["REQUEST_URI"], $matches)) {
    require './first_server.php';
} elseif (preg_match('/\/([^\/]+)\/?/', $_SERVER["REQUEST_URI"], $matches)) {
    $_GET['resource_type'] = $matches[1];
    require './first_server.php';
} else {
    error_log('No matches');
    http_response_code(404);
}


?>