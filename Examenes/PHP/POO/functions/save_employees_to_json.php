<?php

//Funcion para guardar la lista de instancias en un formato JSON
function save_employees_to_json($employees) {
    // Declaramos la ruta del directorio donde se guardaran los archivos JSON
    $directory = realpath(__DIR__ . "/../src");
    
    // Obtenemos los nombres de todos los archivos JSON en el directorio
    $files = array_values(array_filter(scandir($directory), function($file) use ($directory) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'json' && !in_array($file, ['.', '..']);
    }));

    // Mostramos los archivos disponibles para actualizar o crear uno nuevo
    echo "Archivos .json disponibles:\n";
    for ($i = 0; $i < count($files); $i++) {
        echo "   " . ($i + 1) . "> $files[$i]\n";
    }

    echo "\n";
    // Pedimos al usuario el numero del archivo donde guardar los datos
    $filename = readline("Selecciona el número de archivo para actualizar o ingresa un nuevo nombre (sin extensión): ");
    
    // Si el usuario ingreso un numero, usamos ese archivo, sino, creamos uno nuevo con el nombre ingresado por el usuario
    if (is_numeric($filename) && isset($files[$filename - 1])) {
        $filename = $files[$filename - 1];
    } else {
        $filename = $filename . ".json";
    }

    // Creamos un array vacio para almacenar los datos
    $data = [];
    
    // Iteramos sobre cada instancia de Empleado y la convertimos en un array asosiativo con sus datos
    foreach ($employees as $employee) {
        $employeeData = [
            "first_name" => $employee->first_name,
            "last_name" => $employee->last_name,
            "age" => $employee->age,
            "department" => $employee->department,
            "salary" => $employee->salary,
            "type" => get_class($employee)
        ];

        // Si el empleado es un gerente, agregamos el bonus al array asociativo
        if ($employee instanceof Manager) {
            $employeeData["bonus"] = $employee->bonus;
        }

        // Añadimos el array asociativo con los datos al array principal
        $data[] = $employeeData;
    }

    // Escribimos los datos en un archivo JSON en el directorio especificado
    file_put_contents($directory . '/' . $filename, json_encode($data, JSON_PRETTY_PRINT));
    echo "Datos guardados en $filename.\n";
}


?>