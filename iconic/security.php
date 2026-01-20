<?php
class GalaxyS26 {
    private $securityPin = "1234"; // Secret!
    public $modelName = "S26 Ultra";

    // You can't see the PIN, but you can "try" it
    public function unlock($enteredPin) {
        if ($enteredPin === $this->securityPin) {
            echo "Unlocked!";
        } else {
            echo "Access Denied!";
        }
    }
}
$myPhone = new GalaxyS26();
$myPhone->unlock("1234"); // Correct PIN