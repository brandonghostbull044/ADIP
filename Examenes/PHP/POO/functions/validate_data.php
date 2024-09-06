<?php


function transform_name($name) {
    $words = explode(' ', $name);
    $first_name = $words[0];
    $last_name = implode(' ', array_slice($words, 1));
    return [
        "first_name" => $first_name,
        "last_name" => $last_name
    ];
}

function validate_name($name) {
    $pattern = "/^[a-zA-Z]+(?: [a-zA-Z]+)+$/"; // Al menos un nombre y un apellido
    if (!preg_match($pattern, trim($name))) {
        throw new Exception("El nombre completo debe contener al menos un nombre y un apellido, y solo puede contener letras.");
    }
    $parts = transform_name($name);
    return $parts;
}

function validate_age($age) {
    if (!is_numeric($age) || $age < 18 || $age > 65) {
        throw new Exception("El empleado debe tener entre 18 y 65 años.");
    }
    return (int)$age;
}

function validate_type($type) {
    $validTypes = ['a', 'b'];
    if (!in_array($type, $validTypes)) {
        throw new Exception("El tipo de empleado debe ser 'a' para Gerente o 'b' para Empleado base.");
    }
    return $type;
}

?>