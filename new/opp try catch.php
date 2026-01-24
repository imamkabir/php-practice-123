<?php

class BankAccount {
    
    public float $balance = 1000.00;

    /**
     * Attempts to withdraw money from the account.
     * * @param float $amount
     * @return string
     * @throws Exception If funds are insufficient.
     */
    public function withdraw(float $amount): string {
        if ($amount > $this->balance) {
            throw new Exception("Insufficient funds. Available: $" . $this->balance);
        }

        $this->balance -= $amount;
        return "Success. New balance: $" . $this->balance;
    }
}

// Usage ---------------------------------------

try {
    $account = new BankAccount();
    
    // Attempting a risky withdrawal
    echo $account->withdraw(5000.00);

} catch (Exception $e) {
    // Handling the error gracefully
    echo "Error: " . $e->getMessage();
}