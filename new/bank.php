<?php
// BANK ACCOUNT CLASS WITH ENCAPSULATION AND LOGIC

class BankAccount {
    // 1. THE DATA (Encapsulated/Hidden)
    // We mark this PRIVATE so no one can do: $account->balance = 1000000;
    private $balance;
    private $pinCode;

    public function __construct($startMoney, $pin) {
        $this->balance = $startMoney;
        $this->pinCode = $pin;
    }

    // 2. THE PUBLIC METHODS (The Safe Access Points)
    
    // We create a "Getter" function. 
    // This lets people SEE the money, but not TOUCH it.
    public function getBalance() {
        return "Your balance is: $" . $this->balance . "\n";
    }

    // We create a "Setter" function.
    // This allows deposits, but applies RULES (Logic).
    public function deposit($amount) {
        // Rule 1: You can't deposit negative money
        if ($amount < 0) {
            echo "ERROR: You cannot deposit negative money!\n";
            return; // Stop the function
        }

        // If passed the check, we touch the private data
        $this->balance = $this->balance + $amount;
        echo "SUCCESS: Deposited $$amount.\n";
    }

    // Another Action with Logic
    public function withdraw($amount, $enteredPin) {
        // Rule 1: Check Security
        if ($enteredPin !== $this->pinCode) {
            echo "ERROR: Wrong PIN!\n";
            return;
        }

        // Rule 2: Check Funds
        if ($amount > $this->balance) {
            echo "ERROR: You are broke! Not enough money.\n";
            return;
        }

        $this->balance -= $amount;
        echo "SUCCESS: Withdrew $$amount.\n";
    }
}

// --- LET'S TEST THE SHIELD ---

$myAccount = new BankAccount(100, "1234");

// 1. Can I hack the balance directly?
// $myAccount->balance = 500000; 
// RESULT: Fatal Error: Cannot access private property. (THE SHIELD WORKED)

// 2. Can I deposit weird numbers?
$myAccount->deposit(-500); 
// RESULT: ERROR: You cannot deposit negative money! (THE LOGIC WORKED)

// 3. The correct way
$myAccount->deposit(50); // Adds 50
echo $myAccount->getBalance(); // Shows 150

?>