<?php

require_once "./classes/Employee.php";
require_once "./classes/Manager.php";
require_once "./classes/SalariesReport.php";
require_once "./functions/list_employees.php";
require_once "./functions/validate_data.php";
require_once "./functions/save_employees_to_json.php";
require_once "./functions/load_employees_from_json.php";
require_once "./functions/search_employee.php";


$employees = load_employees_from_json();
echo"¿Como quieres iniciar sesion:\n   a> Como administrador\n   b> Como empleado\n";
$user_type = readline("---> ");
if ($user_type == "a") {
    echo "\n\n----------------Bienvenido al administrador de empleados----------------\n\n";
    $correctUsername = 'admin';
    $correctPassword = 'password123';

    while (true) {
        $username = readline("Ingresa tu nombre de usuario: ");
        $password = readline("Ingresa tu contraseña: ");
        
        if ($username === $correctUsername && $password === $correctPassword) {
            echo "Credenciales correctas. Bienvenido, $username!\n";
            break;
        } else {
            echo "Nombre de usuario o contraseña incorrectos. Inténtalo de nuevo.\n";
        }
    }

    while (true) {
        echo "\n\n\n¿Qué deseas realizar?\n   a> Dar de alta a empleado\n   b> Dar de baja a empleado\n   c> Generar reporte de salarios de empleados\n   d> Salir\n";
        $req = readline("---> ");
        switch ($req) {
            case 'a':
                $employee = null;

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

                switch ($type) {
                    case 'a':
                        $bonus = readline("Ingresa el bonus del gerente: ");
                        $employee = new Manager($name["first_name"], $name["last_name"], $age, $department, $salary, $bonus);
                        $employees[] = $employee;
                        echo "Gerente agregado de manera exitosa.";
                        break;
                    case 'b':
                        $employee = new Employee($name["first_name"], $name["last_name"], $age, $department, $salary);
                        $employees[] = $employee;
                        break;
                    default:
                        echo "Tipo de empleado incorrecto.\n";
                        break;
                }
                echo "Empleado dado de alta con éxito.\n";
                save_employees_to_json($employees);
                break;
            case 'b':
                if (count($employees) == 0) {
                    echo "No hay empleados registrados.\n";
                    break;
                } else {
                    list_employees($employees);
                    $index = readline("Ingresa el índice del empleado a dar de baja: ");
                    unset($employees[$index - 1]);
                    echo "Empleado dado de baja con éxito.\n";
                    save_employees_to_json($employees);
                }
                break;
            case 'c':
                $report = new SalariesReport();
                $report->generateReport($employees);
                break;
            case 'd':
                echo "Cerrando sesión...\n";
                return;
            default:
                echo "Opción incorrecta.\n";
                break;
        }
    }
} elseif ($user_type == 'b') {
    if (count($employees) == 0) {
        echo "No hay empleados registrados.\n";
        return;
    } else {
        $employee = null;
        echo "\n\n----------------Bienvenido----------------\n\n";
        while (true)  {
            $name = readline("Ingresa tu nombre: ");
            $employee = search_employee($employees, $name);
            if ($employee != null) {
                break;
            }
        }
        echo "Bienvenido/a: " . $employee->first_name;
        while (true) {
            echo "¿Qué deseas realizar?\n   a> Saludar\n   b> Obtener tu nombre completo\n   c> Obtener tu salario anual\n   d> Salir\n";
            $chose = readline("---> ");
            switch ($chose) {
                case 'a':
                    echo "\n" . $employee->greet() . "\n\n";
                    break;
                case 'b':
                    echo "\nTu nombre completo es: ". $employee->getFullName(). "\n\n";
                    break;
                case 'c':
                    echo "Tu salario anual es: ". $employee->getAnnualSalary(). "\n\n";
                    break;
                case 'd':
                    echo "Cerrando sesión...\n";
                    return false;
                break;
                default:
                    echo "Opción incorrecta.\n";
                    break;
            }
        }
    }

} else {
    echo "Opción incorrecta.\n";
}

?>