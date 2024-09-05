require "../intefaces/Reporteable.php";

class SalariesReport implements Reporteable {
    public function generateReport($data) {
        foreach ($data as $employeeType => $employees) {
            echo "Salaries report for $employeesType:\n";
            foreach ($employees as $employee) {
                $full_name = $employee["FirstName"] . " " . $employee["LastName"];
                $salary = ($employee["Bonus"] && $employee["Bonus"] > 0) ? $employee["Salary"] + $employee["Bonus"] : $employee["Salary"];
                echo "   Nombre: $full_name\nSalario: {$salary * 12}\n\n";
            }
            echo "\n\n\n\n";
        }
    }
}