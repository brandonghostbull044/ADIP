class Employee() {
    public $first_name;
    public $last_name;
    public $age;
    public $department;
    public $saliry;

    public function __construct($first_name, $last_name, $age, $department, $saliry) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
        $this->department = $department;
        $this->saliry = $saliry;
    }

    public function getFullName() {
        echo $this->first_name . ' ' . $this->last_name;
        return $this->first_name. ' ' . $this->last_name;
    }

    public function getAnnualSalary() {
        echo $this->saliry * 12;
        return $this->saliry * 12;
    }
}