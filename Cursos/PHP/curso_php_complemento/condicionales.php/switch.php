<?php


$opcion = "a";
switch ($opcion) {
    case "a":
        echo "Opción A";
        break;
    case "b":
        echo "Opción B";
        break;
    default:
        echo "Opción desconocida";
        break;
}


$opcion = "c";
echo "\n\n";

switch ($opcion) {
    case "a":
    case "b":
        echo "Opción A o B";
        break;
    default:
        echo "Opción desconocida";
        break;
}

?>