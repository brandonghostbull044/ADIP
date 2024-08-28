<?php
    $bool_1 = true;
    $bool_2 = false;
    $bool_3 = false;
    $bool_4 = true;

    echo "Primer evaluacion con el operador AND (&&)\n";
    var_dump($bool_1 && $bool_2);
    echo "Segunda evaluacion con el operador OR (||)\n";
    var_dump($bool_1 || $bool_2);
    echo "Tercera evaluacion con el operador NOT (!)\n";
    var_dump(!$bool_1);

?>