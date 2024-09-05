require "./classes/Employee.php";
require "./classes/Manager.php";
require "./classes/SalariesReport.php";


$employees = [];
echo "----------------Bienvenido al administrador de empleados----------------";
while (true) {
    $req = readline("\n\n\n¿Qué deseas realizar?\n   a> Dar de alta a empleado\n   b> Dar de baja a empleado\n   c> Generar reporte de salarios de empleados\n-----> ");
    switch ($req) {
        case 'a':
            $employee;

            $name = readline("Ingresa el nombre completo del del empleado (separado por comas): ");
            $age = readline("Ingresa la edad del empleado: ");
            $department = readline("Ingresa la posición del empleado: ");
            $salary = readline("Ingresa el salario mensual del empleado: ");
            $type = readline("Ingresael tipo de empleados:\n   a> Gerente\n   b> Empleado base");
            require "./functions/transforme_name.php";
            $name = transform_name($name);
            switch ($type) {
                case 'a':
                    $bonus = readline("Ingresa el bonus del gerente: ");
                    $manager = new Manager($name["first_name"], $name["last_name"], $age, $department, $salary, $bonus);
                    $employees[] = $employee;
                    echo "Gerente agregado de manera exitosa.";
                    break;
                case 'b':
                    $employee = new Employee($name, $department, $salary);
                    break;
                default:
                    echo "Tipo de empleado incorrecto.\n";
                    continue 2;
            }
            echo "Empleado dado de alta con éxito.\n";
            break;
            
        case 'b':
            $id = readline("Ingresa el ID del empleado a dar de baja: ");
            Employee::deleteById($id);
            echo "Empleado dado de baja con éxito.\n";
            break;
            
        case 'c':
            $report = new SalariesReport();
            $report->generateReport();
            break;
            
        default:
    }
}
