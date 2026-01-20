<?php

class Calculator
{
    private static int $calculationCount = 0;

    public static function add(float $a, float $b): float
    {
        self::$calculationCount++;
        return $a + $b;
    }

    public static function subtract(float $a, float $b): float
    {
        self::$calculationCount++;
        return $a - $b;
    }

    public static function multiply(float $a, float $b): float
    {
        self::$calculationCount++;
        return $a * $b;
    }

    public static function divide(float $a, float $b): float
    {
        if ($b == 0) {
            return 0; 
        }
        self::$calculationCount++;
        return $a / $b;
    }

    public static function getCount(): int
    {
        return self::$calculationCount;
    }
}

// --- EXECUTION ---

echo "Result 1: " . Calculator::add(10, 5) . "\n";      // 15
echo "Result 2: " . Calculator::multiply(4, 2) . "\n"; // 8
echo "Result 3: " . Calculator::divide(20, 4) . "\n";   // 5

echo "--------------------\n";
echo "Total operations performed: " . Calculator::getCount() . "\n"; 

?>