<?php

// 1. THE PARENT 
class User {
    protected $name;
    protected $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function login() {
        echo "System: {$this->name} ({$this->email}) has logged in.\n";
    }
}

//  THE CHILD 
// extends User means Student gets $name, $email, and login() for free
class Student extends User {
    private $gpa;

    public function __construct($name, $email, $gpa) {
        // "parent::__construct" tells PHP: 
        // "Hey, use the Father's logic to handle the name and email."
        parent::__construct($name, $email);
        $this->gpa = $gpa;
    }

    public function viewGrades() {
        echo "Student {$this->name} is viewing grades. GPA: {$this->gpa}\n";
    }
}
// create a Student.
$s1 = new Student("Ahmed", "a", 3.8);

// The Student can use the inherited login() method:
$s1->login(); 

// And the special student feature works too:
$s1->viewGrades();

$s2 = new Student("imam", "imam@iconic.edu", 3.0);
$s2->login();
$s2->viewGrades();
?>