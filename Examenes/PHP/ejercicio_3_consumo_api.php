<?php



//Solucion curl

/*
    curl -u adip-appcdmx:von_prios2024@ "https://condesacdmx.mx/sip_develop/apis/api.php?endpoint=VerifyUser&curp=SAJH860530HDFNRG02"
*/





$url = "https://condesacdmx.mx/sip_develop/apis/api.php";
$params = [
    'endpoint' => 'VerifyUser',
    'curp' => 'SAJH860530HDFNRG02'
];

$queryString = http_build_query($params);
var_dump($queryString);
$endPoint = $url . '?' . $queryString;


$username = "adip-appcdmx";
$password = "von_prios2024@";

$options = [
    "http" => [
        "method" => "GET",
        "header" => "Authorization: Basic " . base64_encode("$username:$password")
    ]
];


$response = file_get_contents($endPoint, false, stream_context_create($options));


if ($response === FALSE) {
    die('Error al realizar la petición');
}


$data = json_decode($response);

foreach ($data as $key => $value) {
    if (is_array($value) || is_object($value)) {
        echo "$key:\n";
        foreach ($value as $item) {
            if (is_object($item)) {
                foreach ($item as $subKey => $subValue) {
                    echo "  $subKey: $subValue\n";
                }
            } else {
                echo "  $item\n";
            }
        }
    } else {
        echo "$key: $value\n";
    }
}



?>
