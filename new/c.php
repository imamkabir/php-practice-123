<?php
// 1️ Anonymous helper function
$errorHandler = function($exp) {
    return "Oops! $exp is invalid";
};

// 2️Power function
function power($base, $exp, callable $onError) {
    static $calls = 0;
    $calls++;

    if ($exp < 0) {
    
        return $onError($exp);
    }

    $result = pow($base, $exp);

    // print how many times the function has been called so far
    // echo "Power function called $calls times\n";

    return $result;
}

// 3️Call the function 3 times
$result1 = power(2, 3, $errorHandler);   // valid
$result2 = power(5, -2, $errorHandler);  // invalid
$result3 = power(10, 0, $errorHandler);  // valid

// 4️ Echo the results
echo "Result1: $result1\n";
echo "Result2: $result2\n";
echo "Result3: $result3\n";
