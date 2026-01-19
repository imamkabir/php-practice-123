<?php
// CLASS 1: THE STUDENT (The Actor)
class StudentProfile {
    // PUBLIC: It's okay for everyone to see the name
    public $fullName;

    // PRIVATE: Sensitive data!
    // No one can change the ID after creation.
    // No one can edit the GPA directly (must earn it).
    // No one can steal money from the wallet.
    private $studentID;
    private $gpa;
    private $tuitionBalance;

    // CONSTRUCTOR: Setup the student
    // Note: I am using generic variable names ($n, $id) to prove the "Tube" theory.
    public function __construct($n, $id, $startingGpa) {
        $this->fullName = $n;
        $this->studentID = $id;
        $this->gpa = $startingGpa;
        $this->tuitionBalance = 0; // Starts with 0 debt
    }

    // --- PUBLIC INTERFACE (The Buttons) ---

    // GETTER: Allow reading the ID, but NOT changing it.
    // There is no "setStudentID" function, so it is READ-ONLY.
    public function getID() {
        return $this->studentID;
    }

    // GETTER: Allow reading GPA
    public function getGPA() {
        return $this->gpa;
    }

    // COMPLEX METHOD: Charging Tuition
    // We don't just set the variable. We log the debt.
    public function chargeTuition($amount) {
        $this->tuitionBalance += $amount;
        echo "[LOG]: User {$this->fullName} was charged $$amount. Total Debt: $$this->tuitionBalance\n";
    }

    // COMPLEX METHOD: Paying Tuition
    // Logic: You cannot pay more than you owe.
    public function payTuition($amount) {
        if ($amount <= 0) {
            echo "ERROR: Payment must be positive.\n";
            return;
        }

        if ($amount > $this->tuitionBalance) {
            echo "ERROR: You are overpaying! You only owe $$this->tuitionBalance.\n";
            return;
        }

        // Logic Passed: Access the private data
        $this->tuitionBalance -= $amount;
        echo "SUCCESS: {$this->fullName} paid $$amount. Remaining Debt: $$this->tuitionBalance\n";
    }
}
// CLASS 2: THE COURSE (The Resource)
class CourseUnit {
    public $courseName;
    
    // PRIVATE: We must control class size strictly
    private $courseCode;
    private $maxCapacity;
    private $enrolledStudents = 0; // Starts empty cause it always does
    private $minGpaRequirement;

    public function __construct($name, $code, $cap, $minGpa) {
        $this->courseName = $name;
        $this->courseCode = $code;
        $this->maxCapacity = $cap;
        $this->minGpaRequirement = $minGpa;
    }

    //  Attempt to Enroll a Student
    //  We pass the WHOLE Student Object ($studentObj) into this function!
    public function enrollStudent($studentObj) {
        
        echo "\n--- Attempting to enroll {$studentObj->fullName} into {$this->courseName} ---\n";

        // LOGIC CHECK  Is the course full?
        if ($this->enrolledStudents >= $this->maxCapacity) {
            echo "FAILED: Course is Full! ({$this->enrolledStudents}/{$this->maxCapacity})\n";
            return;
        }

        // LOGIC CHECK  Is the student smart enough?
        // We use the Student's public getter to see their private GPA.
        if ($studentObj->getGPA() < $this->minGpaRequirement) {
            echo "FAILED: GPA too low. Required: {$this->minGpaRequirement}. Student has: " . $studentObj->getGPA() . "\n";
            return;
        }

        // SUCCESS SCENARIO
        //  Add to count
        $this->enrolledStudents++; 
        
        // 2. Charge the student $1000 using their public method
        $studentObj->chargeTuition(1000);

        echo "SUCCESS: Enrolled! Seats remaining: " . ($this->maxCapacity - $this->enrolledStudents) . "\n";
    }
    
    // PUBLIC UTILITY: Check status
    public function getStatus() {
        return "Course {$this->courseCode}: {$this->enrolledStudents}/{$this->maxCapacity} students.\n";
    }
}

// =============================================================
// MAIN EXECUTION (The Simulation)
// =============================================================

echo "=== SYSTEM BOOT: ICONIC UNIVERSITY ===\n\n";

// 1. Create 3 Students (Objects)
// "The Smart One" (GPA 4.0)
$s1 = new StudentProfile("Ahmed", "STU-001", 4.0);
// "The Average One" (GPA 2.5)
$s2 = new StudentProfile("Sarah", "STU-002", 2.5);
// "The Slacker" (GPA 1.5)
$s3 = new StudentProfile("Mike", "STU-003", 1.5);

// 2. Create a Course (Object)
// Name: PHP OOP
// Capacity: ONLY 2 Students (Very exclusive!)
// Min GPA: 2.0
$phpCourse = new CourseUnit("Advanced PHP OOP", "COS-202", 2, 2.0);

// 3. ENROLLMENT PROCESS

// Attempt 1Ahmed 
$phpCourse->enrollStudent($s1);

// Attempt 2: Mike 
$phpCourse->enrollStudent($s3);

// Attempt 3: Sarah 
$phpCourse->enrollStudent($s2);

// Attempt 4: A New Student? 
// Wait The course capacity was 2. We already enrolled Ahmed and Sarah.
// Let's create a 4th student and try.
$s4 = new StudentProfile("Late Comer", "STU-004", 4.0);
$phpCourse->enrollStudent($s4); 

echo "\n=== FINANCIAL UPDATE ===\n";

// 4. PAYING FEES
// Ahmed tries to pay
$s1->payTuition(500); // Partial payment
$s1->payTuition(5000); // Overpayment Error

// Check Final Status
echo "\n" . $phpCourse->getStatus();

?>