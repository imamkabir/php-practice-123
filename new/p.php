<?php
// 1️⃣ Anonymous helper function for invalid exponent
$errorHandler = function($exp) {
    return "Oops! $exp is invalid";
};

// 2️⃣ Function to raise to power
function power($base, $exp, callable $onError) {
    static $calls = 0;
    $calls++;

    // If exponent is negative, call the helper
    if ($exp < 0) {
        return $onError($exp);
    }

    return $base ^ $exp;
}

// 3️⃣ Use the function
$result1 = power(2, 3, $errorHandler);    // 2^3
$result2 = power(5, -2, $errorHandler);   // 5^-2 triggers error
$result3 = power(10, 0, $errorHandler);   // 10^0

// 4️⃣ Echo results
echo "Result1: $result1\n";
echo "Result2: $result2\n";
echo "Result3: $result3\n";
