<?php
// 1️⃣ Create an anonymous helper function to handle invalid numbers
$errorHandler = function($y) { 
     Return "Oops! <num> is invalid: $y";
};

// 2️⃣ Function to add two numbers
function add($a, $b) {
     return  $a + $b;
}

// 3️⃣ Function to multiply two numbers with callable error handler
function multiply($a, $b, callable $onError) {
    static $calls = 0; // track how many times multiply is called
    $calls++;

    if ($b <= 0) {
         return $onError; $y;
    }

   return $a * $b;
}

// 4️⃣ Function to subtract two numbers
function subtract($a, $b) {
    return $a - $b;
}

// 5️⃣ Use the functions
$sum = add(10, 5);                // add 10 + 5
$product = multiply($sum, 2, $errorHandler);  // multiply sum by 2
$productError = multiply($sum, -1, $errorHandler); // multiply sum by -1 (triggers error)
$difference = subtract($product, 5);  // subtract 5 from product

// 6️⃣ Echo results
echo "Sum: $sum\n";
echo "Product: $product\n";
echo "Product with error: $productError\n";
echo "Difference: $difference\n";
