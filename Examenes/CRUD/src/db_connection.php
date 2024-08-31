<?php


$host = '127.0.0.1';
$db = 'USUARIOS';
$user = 'brandonADIP';
$pass = 'contr4s3n4s3gur4';


$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

// Función para obtener todos los IDs
function getAllIds($pdo) {
    $query = "CALL ObtenerIDs()";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Obtener todos los IDs como un array de números
    $ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    return $ids;
}

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Obtencion de numero total de registros
    $all_users_id = getAllIds($pdo);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}


?>