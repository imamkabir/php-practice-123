<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// --- 1. array_filter ---
// This function loops through the array and KEEPS only what you want.
// We are telling it: "Only keep numbers that are less than or equal to 5"

$lessThanFive = array_filter($numbers, function ($number) {
    return $number <= 5; // If this is TRUE, keep the number. If FALSE, throw it away.
});

// PROBLEM: When you filter, the indexes get messy (e.g., [0]=>1, [4]=>5).
// It keeps the original slot numbers.

// --- 2. array_values (The Fix) ---
// We use this to "Reset" the numbers so they start from 0, 1, 2... again.
// It's like shuffling the deck to close the gaps.

$cleanList = array_values($lessThanFive);

print_r($cleanList);
?>