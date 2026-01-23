<?php
// Defining the trait trait means to create a reusable set of methods
// that can be included within multiple classes.
trait CardScanner {
    public function swipeCard($idNumber) {
        echo "System: Scanning ID: $idNumber... Access Granted.\n";
    }
}

class Human {
    public function talk() {
        echo "Hello.\n";
    }
}

class Student extends Human {
    use CardScanner;
}

class Machine {
    public function useElectricity() {
        echo "Powering up system...\n";
    }
}

class AutomaticDoor extends Machine {
    use CardScanner;
}

// Execution
$imam = new Student();
$imam->talk();
$imam->swipeCard(405);

echo "----------------\n";

$libraryDoor = new AutomaticDoor();
$libraryDoor->useElectricity();
$libraryDoor->swipeCard(999);

?>