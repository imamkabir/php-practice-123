<?php
// 1️Error handlers
$multiplyError = function($b) {
    return "Oops! Multiply by $b is invalid";
};
$powerError = function($b) {
    return "Oops! Power of $b is invalid";
};

// 2️ Functions
function add($a, $b) {
    static $calls = 0;
    $calls++;
    echo "[add called $calls times]\n";
    return $a + $b;
}

function subtract($a, $b) {
    static $calls = 0;
    $calls++;
    echo "[add called $calls times]\n";
    return $a - $b;
}

function multiply($a, $b, callable $onError) {
    static $calls = 0;
    $calls++;
echo "[add called $calls times]\n";
    if ($b <= 0) {
        return $onError($b);
    }

    return $a * $b;
}

function power($a, $b, callable $onError) {
    static $calls = 0;
    $calls++;
    echo "[add called $calls times]\n";

    if ($b < 0) {
        return $onError($b);
    }

    return pow($a, $b);
}

// 3️ Use the functions
$sum = add(10, 5);                // 15
$diff = subtract(20, 4);          // 16
$prod = multiply($sum, 2, $multiplyError);  // 30
$prodError = multiply($sum, 1, $multiplyError); // triggers error
$exp  = power($prod, 3, $powerError);        // 30^3 = 27000
$expError = power($prod, 2, $powerError);   // triggers error

// 4️ Print results
echo "Sum: $sum\n";
echo "Difference: $diff\n";
echo "Product: $prod\n";
echo "Product Error: $prodError\n";
echo "Exponent: $exp\n";
echo "Exponent Error: $expError\n";
