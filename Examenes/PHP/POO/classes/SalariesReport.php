require "../intefaces/Reporteable.php";

class SalariesReport implements Reporteable {
    public function generateReport($employees) {
        echo "\n\nReporte de salarios de empleados\n:";
        foreach ($employees as $employee) {
            $type = get_class($employee);
            echo "\n   Tipo de empleado: ". $type;
            echo "\n     Empleado: ". $employee->getFullName();
            echo "\n     Sueldo: ". $employee->getAnnualSalary();
        }
    }
}