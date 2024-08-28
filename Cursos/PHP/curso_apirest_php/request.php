<?php


$json_content = file_get_contents("https://xkcd.com/info.0.json").PHP_EOL;
$data = json_decode($json_content, true);
var_dump($data);
echo $data['img'];


?>