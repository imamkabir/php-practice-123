<?php
// Only we know the secret 🍎
$magicApple = function($mysteryFruit) {
    // Check if the fruit is real 🍏
    if (!isset($mysteryFruit)) return 0;

    // Do some "magic math"
    $enchanted = ($mysteryFruit + 0) * 2;

    // Another layer of mystery
    return $enchanted;
};

// Call the spell with the number 5
echo $magicApple(5); // Output is 10, but shhh...
