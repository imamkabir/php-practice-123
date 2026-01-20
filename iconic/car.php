<?php

// 1. THE CONTRACT
interface Driveable {
    public function startEngine(): string;
}

// 2. THE BLUEPRINT
abstract class Car implements Driveable {
    public function __construct(
        public string $model, 
        public int $price, 
        protected bool $isSold = false // Encapsulation
    ) {}

    public function markAsSold(): void {
        $this->isSold = true;
    }

    public function getStatus(): string {
        return $this->isSold ? "SOLD" : "AVAILABLE";
    }

    // Abstract: Every car starts differently
    abstract public function startEngine(): string;
}

// 3. THE PRODUCTS
class ToyotaCorolla extends Car {
    public function startEngine(): string {
        return "Silent hum... {$this->model} is ready.";
    }
}

class MercedesBenz extends Car {
    public function startEngine(): string {
        return "V8 ROAR! {$this->model} is aggressive.";
    }
}

// 4. THE BUYER
class Student {
    private int $walletBalance; // Private: Security!

    public function __construct(public string $name, int $initialMoney) {
        $this->walletBalance = $initialMoney;
    }

    public function buyCar(Car $car): void {
        echo "Attempting to buy {$car->model} for \${$car->price}...\n";

        // LOGIC CHECK
        if ($car->getStatus() === "SOLD") {
            echo "❌ Error: This car is already owned by someone else!\n";
            return;
        }

        if ($this->walletBalance < $car->price) {
            echo "❌ Transaction Failed: You are broke, {$this->name}.\n";
            return;
        }

        // PROCESS TRANSACTION
        $this->walletBalance -= $car->price;
        $car->markAsSold();

        echo "Success! {$this->name} bought the {$car->model}.\n";
        echo "   New Balance: \${$this->walletBalance}\n";
        echo "   Action: " . $car->startEngine() . "\n";
    }
}

// --- EXECUTION FLOW ---

$myToyota = new ToyotaCorolla("Corolla 2024", 20000);
$myBenz   = new MercedesBenz("AMG GT", 80000);

$ibrahim  = new Student("Ibrahim", 50000);

// SCENARIO 1
$ibrahim->buyCar($myBenz);

echo "\n----------------\n";

// SCENARIO 2
$ibrahim->buyCar($myToyota);

echo "\n----------------\n";

// SCENARIO 3
$ibrahim->buyCar($myToyota);

?>