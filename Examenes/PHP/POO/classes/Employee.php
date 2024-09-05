require "../abstract/Person.php";

class Employee extends Person {
    public $first_name;
    public $last_name;
    public $age;
    public $department;
    public $salary;

    public function __construct($first_name, $last_name, $age, $department, $salary) {
        parent::__construct($first_name . ' ' . $last_name);
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function getFullName() {
        return $this->first_name. ' ' . $this->last_name;
    }

    public function getAnnualSalary() {
        return $this->salary * 12;
    }

    public function greet () {
        return "Hola, mi nombre es ". $this->getFullName(). ". Soy empleado del departamento ". $this->department.;
    }
}