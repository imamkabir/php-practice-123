<?php
// The helper function
$errorHandler = function($y) {
    return "Cannot divide by $y";
};

// The main function
function divide($x, $y, callable $onError) {
    if ($y <= 0) {
        return $onError($y); // CALL the helper
    }
    return $x / $y;
}

// Using it
echo divide(10, 2, $errorHandler); // prints 5
echo "\n";
echo divide(10, 0, $errorHandler); // prints "Cannot divide by 0"
