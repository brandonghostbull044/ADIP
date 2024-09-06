<?php


require_once  __DIR__ . "/./validate_data.php";

function request_data() {
    $name = null;
    $age = null;
    $department = null;
    $salary = null;
    $type = null;

    while (true) {
        try {
            $new_name = readline("Ingresa el nombre completo del empleado (separado por espacios): ");
            $name = validate_name($new_name);
            break; 
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }

    while (true) {
        try {
            $age = readline("Ingresa la edad del empleado: ");
            $age = validate_age($age);
            break;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }

    $department = readline("Ingresa el departamento del empleado: ");

    while (true) {
        try {
            $salary = readline("Ingresa el salario mensual del empleado: ");
            if (!is_numeric($salary)) {
                throw new Exception("El salario debe ser un número.");
            }
            $salary = (float)$salary;
            break;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }

    while (true) {
        try {
            echo "Ingresa el tipo de empleado:\n   a> Gerente\n   b> Empleado base\n";
            $type = readline("---> ");
            $type = validate_type($type);
            break;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }

    return [$name, $age, $department, $salary, $type];
}

?>