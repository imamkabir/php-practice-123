<?php
// 1️⃣ Discount error handler (arrow function)
$discountError = fn($d) => "Invalid discount: $d";

// 2️⃣ Add function
function add($a, $b) {
    return $a + $b;
}

// 3️⃣ Apply discount function
function applyDiscount($price, $discount, callable $onError) {

    if ($discount > 1) {
        return $onError($discount);    
    }

    $finalPrice = $price - ($price * $discount);
    return;
}

// 4️⃣ Use the functions
$total = add(100, 50);
$final = applyDiscount($total, 0.2, $discountError);

echo "Final price: $final\n";
