<?php

/**
 * Interface PaymentGateway
 * * Defines the contract for all third-party payment providers.
 */
interface PaymentGateway
{
    public function charge(float $amount): bool;
    public function getProviderName(): string;
}

/**
 * Abstract Class BaseTransaction
 * * Handles shared transaction logic such as ID generation and logging.
 */
abstract class BaseTransaction
{
    protected string $transactionId;

    public function __construct()
    {
        // Generate a unique transaction reference
        $this->transactionId = "TX-" . rand(10000, 99999);
    }

    /**
     * Standardized receipt logging for all transactions.
     */
    public function printReceipt(string $status): void
    {
        echo "    Receipt [{$this->transactionId}]: Status = {$status}\n";
    }
}

/**
 * Class Paystack
 * * Implementation for Card payments via Paystack.
 */
class Paystack extends BaseTransaction implements PaymentGateway
{
    public function getProviderName(): string
    {
        return "Paystack";
    }

    public function charge(float $amount): bool
    {
        echo "Connecting to Paystack...\n";
        echo "   Processing " . number_format($amount) . " via Card...\n";
        
        $this->printReceipt("SUCCESS"); 
        return true;
    }
}

/**
 * Class OPay
 * * Implementation for Mobile Money/USSD payments via OPay.
 */
class OPay extends BaseTransaction implements PaymentGateway
{
    public function getProviderName(): string
    {
        return "OPay";
    }

    public function charge(float $amount): bool
    {
        echo "Opening OPay App...\n";
        echo "   Transferring " . number_format($amount) . " via USSD Code...\n";
        
        // Deduct service fee cause opay are scammers 
        echo "   (Fee: 10 deducted)\n";
        
        $this->printReceipt("SUCCESS");
        return true;
    }
}

/**
 * Class PixelPlexStore
 * * Handles the checkout process using any valid PaymentGateway.
 */
class PixelPlexStore
{
    public function checkout(PaymentGateway $gateway, float $price)
    {
        echo "\nCustomer chose to pay with " . $gateway->getProviderName() . "\n";
        
        if ($gateway->charge($price)) {
            echo "Order Confirmed! Shipping items...\n";
        } else {
            echo "Payment Failed.\n";
        }
    }
}

// --- making my code work ---

$store = new PixelPlexStore();

// Transaction 1: Paystack
$paystackTx = new Paystack();
$store->checkout($paystackTx, 5000);

echo "---------------------------------\n";

// Transaction 2: OPay
$opayTx = new OPay();
$store->checkout($opayTx, 2500);

?>\
class varables and instace varables 