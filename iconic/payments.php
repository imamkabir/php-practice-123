<?php

interface PaymentMethod {
    public function pay($amount);
    public function getReceipt();
}

class PayPal implements PaymentMethod {
    public function pay($amount) {
        echo "Processing PayPal payment of $$amount...\n";
    }

    public function getReceipt() {
        return "PAYPAL-" . rand(1000, 9999);
    }
}

class BankTransfer implements PaymentMethod {
    public function pay($amount) {
        echo "Processing Bank Transfer of $$amount...\n";
    }

    public function getReceipt() {
        return "BANK-REF-" . rand(1000, 9999);
    }
}

/**
 * This function accepts ANY class that implements PaymentMethod.
 * This is called Type-Hinting.
 */
function processPayment(PaymentMethod $method, $amount) {
    $method->pay($amount);
    echo "Transaction Receipt: " . $method->getReceipt() . "\n\n";
}

// Execution
$paypal = new PayPal();
$bank   = new BankTransfer();

processPayment($paypal, 1200);
processPayment($bank, 2500);

?>