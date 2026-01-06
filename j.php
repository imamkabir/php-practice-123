<?php
function sum(...$numbers) {
    $result = 0; // start sum at 0

    foreach ($numbers as $number) {
        $result += $number; // add each number
    }

    return $result; // return total
}$b = [20, 30, 55];

// usage
echo sum(1, 2, 3, 4, ...$b); // prints 10
// also here i have the unpacking arrary or what evey we call it i dont care rellu 