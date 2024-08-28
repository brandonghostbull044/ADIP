<?php


$file = fopen("./results_6aeb6252-c531-449d-bf29-e11193358b8c.csv", "r");

$match = 0;
$non_match = 0;

$t = time();

while (!feof($file)) {
    $line = fgets($file);
    if (preg_match(
        '/^(\d{4,4}\-\d\d\-\d\d),(.+),(.+),(\d+),(\d+),.*$/i',
        $line,
        $m
    )) {
        $match++;
        if ($m[4] == $m[5]) {
            echo "Empate: ";
        } elseif ($m[4] > $m[5]) {
            echo "Local:   ";
        } else {
            echo "Visitante: ";
        }
        printf("\t%s, %s [%d-%d]\n", $m[2], $m[3], $m[4], $m[5]);
    } else {
        $non_match++;
    }
}

fclose($file);
printf("\n\nmatch: %d\nnon_match: %d\n", $match, $non_match);
printf("Tiempo: %d\n", time() - $t);


?>