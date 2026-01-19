<?php
// Anonymous helper function for handling errors
$errorHandler = function($y) {
    return "Oops! Invalid number: $y";
};

// Function to add two numbers
function add($a, $b) {
    return $a + $b;
}

// Function to multiply two numbers with a callback for invalid input
function multiply($a, $b, callable $onError) {
    static $calls = 0;
    $calls++; // keeps track of how many times multiply is called

    if ($b <= 0) {
        return $onError($b); // call the helper function if $b is invalid
    }

    return $a * $b;
}

// Step 1
$sum = add(5, 10);

// Step 2
$product1 = multiply($sum, 2, $errorHandler);
$product2 = multiply($sum, 3, $errorHandler);

// Step 3
echo "Sum: $sum\n";
echo "Product1: $product1\n";
echo "Product2: $product2\n";
