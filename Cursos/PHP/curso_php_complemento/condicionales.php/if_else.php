<?php


$confirmation = true;

if ($confirmation) {
    echo "La confirmación fue exitosa.";
} else {
    echo "La confirmación no fue exitosa.";
}

$confirmation = "No";
echo "\n\n";

if ($confirmation === true) {
    echo "La confirmación fue exitosa.";
} else if ($confirmation === "No") {
    echo "La confirmación no fue exitosa. Ademas ocaciono un error.";
} else {
    echo "La confirmación no fue exitosa.";
}


?>