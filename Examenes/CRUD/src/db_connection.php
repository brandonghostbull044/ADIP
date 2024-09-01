<?php


$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASS');


$host = $db_host;
$db = $db_name;
$user = $db_user;
$pass = $db_pass;

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