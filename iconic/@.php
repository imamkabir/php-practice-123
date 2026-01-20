<?php

class ATMCard {
    private $name;
    private $cardNumber;
    private $pin;
    private $balance;
    private $isFrozen;
    private $logs = [];

    public function __construct($name, $pin, $balance) {
        $this->name = $name;
        $this->pin = $pin;
        $this->balance = $balance;
        
        $this->cardNumber = rand(1000, 9999) . "-" . rand(1000, 9999);
        $this->isFrozen = false;

        $this->log("Card issued to $name with balance: $$balance");
    }

    // --- PRIVATE HELPERS ---

    private function log($action) {
        $this->logs[] = "[" . date("H:i:s") . "] " . $action;
    }

    // --- PUBLIC METHODS ---

    public function getDetails() {
        return "Holder: {$this->name} | Card: {$this->cardNumber}";
    }

    public function deposit($amount) {
        if ($this->isFrozen) {
            echo "Error: Card is frozen.\n";
            return;
        }

        if ($amount <= 0) {
            echo "Error: Invalid amount.\n";
            return;
        }

        $this->balance += $amount;
        $this->log("Deposited: $$amount");
        echo "Success: Deposited $$amount.\n";
    }

    public function withdraw($amount, $pin) {
        if ($this->isFrozen) {
            echo "Error: Card is frozen.\n";
            return;
        }

        if ($pin !== $this->pin) {
            echo "Error: Incorrect PIN.\n";
            $this->log("Failed withdrawal: Wrong PIN");
            return;
        }

        if ($amount > $this->balance) {
            echo "Error: Insufficient funds. Balance: $$this->balance\n";
            $this->log("Failed withdrawal: Low balance");
            return;
        }

        $this->balance -= $amount;
        $this->log("Withdrew: $$amount");
        echo "Success: Withdrew $$amount.\n";
    }

    public function changePin($oldPin, $newPin) {
        if ($oldPin !== $this->pin) {
            echo "Error: Incorrect old PIN.\n";
            return;
        }

        if (strlen($newPin) !== 4) {
            echo "Error: PIN must be 4 digits.\n";
            return;
        }

        $this->pin = $newPin;
        $this->log("PIN updated successfully");
        echo "Success: PIN changed.\n";
    }

    public function freezeCard($adminPassword) {
        if ($adminPassword === "admin123") {
            $this->isFrozen = true;
            $this->log("Card frozen by ADMIN");
            echo "Admin Action: Card frozen.\n";
        } else {
            echo "Security Alert: Unauthorized admin access.\n";
        }
    }

    public function printStatement($pin) {
        if ($pin !== $this->pin) {
            echo "Access Denied.\n";
            return;
        }

        echo "\n--- Statement for {$this->name} ---\n";
        foreach ($this->logs as $entry) {
            echo $entry . "\n";
        }
        echo "---------------------------------\n";
    }
}

// --- MAIN EXECUTION ---

echo "--- SYSTEM ONLINE ---\n";

$myCard = new ATMCard("Software Engineer", "1111", 5000000);

echo $myCard->getDetails() . "\n";

// 1. Withdrawal Fail (Wrong PIN)
$myCard->withdraw(100, "1111");

// 2. Withdrawal Success
$myCard->withdraw(50, "1111");

// 3. Deposit
$myCard->deposit(1000);

// 4. Change PIN
$myCard->changePin("1111", "5555");

// 5. Admin Freeze
$myCard->freezeCard("admin123");

// 6. View History (Using new PIN)
$myCard->printStatement("5555");

?>