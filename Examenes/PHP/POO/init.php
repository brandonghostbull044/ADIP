<?php

//Importamos los archivos necesarios
require_once "./classes/Employee.php";
require_once "./classes/Manager.php";
require_once "./classes/SalariesReport.php";
require_once "./functions/list_employees.php";
require_once "./functions/save_employees_to_json.php";
require_once "./functions/load_employees_from_json.php";
require_once "./functions/search_employee.php";
require_once "./functions/request_data.php";


//Cargamos los empleados desde el JSON
$employees = load_employees_from_json();

//Menu principal
echo"¿Como quieres iniciar sesion:\n   a> Como administrador\n   b> Como empleado\n";
$user_type = readline("---> ");

//Si el usuario es administrador, entramos al para solicitar sus credenciales
if ($user_type == "a") {
    echo "\n\n----------------Bienvenido al administrador de empleados----------------\n\n";
    //Inicialzacion de las credenciales correctas
    $correctUsername = 'admin';
    $correctPassword = 'password123';

    //Loop para verificar las credenciales del administrador
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

    //Menu de administración
    while (true) {
        echo "\n\n\n¿Qué deseas realizar?\n   a> Dar de alta a empleado\n   b> Dar de baja a empleado\n   c> Generar reporte de salarios de empleados\n   d> Salir\n";
        $req = readline("---> ");
        //Switch para realizar la accion segun lo solicitado por el usuario
        switch ($req) {
            //Caso para dar de alta a un empleado
            case 'a':
                $employee = null;

                //Inicializamos los datos del empleado con la funcion request_data que los va solicitando uno a uno al usuario
                list($name, $age, $department, $salary, $type) = request_data();

                //Dependiendo del tipo de si el empleado es gerente, solicitamos el dato adicional
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
                //Ejecucion de la funcion para guardar los datos en el archivo JSON
                save_employees_to_json($employees);
                break;
            //Caso para dar de baja a un empleado
            case 'b':
                //Si no hay empleados en el archivo lo mencionamos al usuario
                if (count($employees) == 0) {
                    echo "No hay empleados registrados.\n";
                    break;
                } else {
                    //Ejecucion de la funcion para listar los empleados y que el usuario selecione cual quiere eliminar
                    list_employees($employees);
                    $index = readline("Ingresa el índice del empleado a dar de baja: ");
                    unset($employees[$index - 1]);
                    echo "Empleado dado de baja con éxito.\n";
                    //Ejecucion de la funcion para guardar los datos en el archivo JSON y actualizar
                    save_employees_to_json($employees);
                }
                break;
            //Caso para generar un reporte
            case 'c':
                //Instanciamos la clase SalariesReport
                $report = new SalariesReport();
                //Ejecucion del metodo para generar el reporte de salarios y mostrarlo al usuario
                $report->generateReport($employees);
                break;
            //Caso para salir
            case 'd':
                echo "Cerrando sesión...\n";
                return;
            default:
                echo "Opción incorrecta.\n";
                break;
        }
    }
//Si el usaurio es empleado
} elseif ($user_type == 'b') {
    //Si no hay empleados en el archivo lo mencionamos al usuario
    if (count($employees) == 0) {
        echo "No hay empleados registrados.\n";
        return;
    } else {
        //Ejecucion del loop para que el usuario pueda buscarse en la lista de empleados
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
        //Bucle para que el usaurio realice varias acciones
        while (true) {
            echo "¿Qué deseas realizar?\n   a> Saludar\n   b> Obtener tu nombre completo\n   c> Obtener tu salario anual\n   d> Salir\n";
            $chose = readline("---> ");
            //Switch para realizar la accion segun lo solicitado por el usuario
            switch ($chose) {
                //Caso para saludar
                case 'a':
                    //Ejecutamos el metodo para saludar
                    echo "\n" . $employee->greet() . "\n\n";
                    break;
                //Caso para obtener el nombre completo
                case 'b':
                    //Inprimimos el resultado del metodo para obtener el nombre completo
                    echo "\nTu nombre completo es: ". $employee->getFullName(). "\n\n";
                    break;
                //Caso para obtener el salario anual
                case 'c':
                    //Inprimimos el resultado del metodo para obtener el salario anual
                    echo "Tu salario anual es: ". $employee->getAnnualSalary(). "\n\n";
                    break;
                //Caso para salir
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
    //Si el usuario ingreso una opcion incorrecta
    echo "Opción incorrecta.\n";
}

?>