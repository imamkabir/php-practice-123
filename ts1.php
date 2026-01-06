<?php
function multiply(...$numbers) {
    $result = 1; // start at 1 for multiplication

    foreach ($numbers as $number) {
        $result *= $number;
    }

    return $result;
}

echo multiply(2, 3, 4); // prints 24
// prints 1 since no arguments are passed