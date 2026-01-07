<?php
function subtract($x, $y) {
    return $x - $y;
}

function divide($x, $y = 1) {
    if ($y === 0) {
        return "Cannot divide by zero";
    }
    return $x / $y;
}

// Step 1: subtract
$first = subtract(10, 2); // 8

// Step 2: divide
$second = divide($first, 2); // 4

// Step 3: add 5
$final = $second + 5; // 9

echo $final; // prints 9
