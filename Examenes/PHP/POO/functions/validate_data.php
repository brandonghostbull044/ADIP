<?php


//Funcion para transformar el nombre completo en un array asociativo
function transform_name($name) {
    //Partimos el nombre completo por los espacios en blanco
    $words = explode(' ', $name);
    //Extraemos el primer nombre
    $first_name = $words[0];
    //Juntamos los nombres restantes en un solo string con espacios en blanco como separador para obener el o los apellidos
    $last_name = implode(' ', array_slice($words, 1));
    //Retornamos el array creado con el nombre y el/los apellidos
    return [
        "first_name" => $first_name,
        "last_name" => $last_name
    ];
}

//Funcion para validar el nombre
function validate_name($name) {
    //Expresion regular para validar que el nombre sea compuesto solo por letras y espacios en blanco y al menos un nombre y un apellido
    $pattern = "/^[a-zA-Z]+(?: [a-zA-Z]+)+$/";
    //Si no coincide con la expresion regular, lanza una excepcion con el mensaje de error
    if (!preg_match($pattern, trim($name))) {
        throw new Exception("El nombre completo debe contener al menos un nombre y un apellido, y solo puede contener letras.");
    }
    //Si coincide, transforma el nombre en un array asociativo y retorna el resultado
    $parts = transform_name($name);
    return $parts;
}

//Funcion para validar la edad
function validate_age($age) {
    //Si la edad no es numerica o no es un entero entre 19 y 64, lanza una excepcion con el mensaje de error
    if (!is_numeric($age) || $age < 18 || $age > 65) {
        throw new Exception("El empleado debe tener entre 18 y 65 años.");
    }
    // Si es valida, retorna la edad como un entero
    return (int)$age;
}

//Funcion para validar el tipo de empleado
function validate_type($type) {
    //Si el tipo de empleado no es 'a' o 'b', lanza una excepcion con el mensaje de error
    $validTypes = ['a', 'b'];
    if (!in_array($type, $validTypes)) {
        throw new Exception("El tipo de empleado debe ser 'a' para Gerente o 'b' para Empleado base.");
    }
    // Si es valido, retorna el tipo de empleado como una cadena
    return $type;
}

?>