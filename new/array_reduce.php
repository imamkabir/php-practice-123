<?php
// Create an array representing items in a shopping cart
// Each item is an associative array with name, price, quantity, and discount
$cart = [
    ['name' => 'Laptop',   'price' => 1500, 'quantity' => 2, 'discount' => 0.1], // Laptop costs 1500, 10% discount, 2 units
    ['name' => 'Mouse',    'price' => 50,   'quantity' => 3, 'discount' => 0],   // Mouse costs 50, no discount, 3 units
    ['name' => 'Keyboard', 'price' => 100,  'quantity' => 1, 'discount' => 0.2], // Keyboard costs 100, 20% discount, 1 unit
];

// Use array_reduce to calculate the total price of the cart after discounts
// $carry will store the running total as we go through each item
// $item represents the current item we are processing
$total = array_reduce($cart, function($carry, $item) {

    // Calculate the price of this item after applying its discount
    // For example, if price = 1500 and discount = 0.1, priceAfterDiscount = 1350
    $priceAfterDiscount = $item['price'] * (1 - $item['discount']);

    // Multiply the discounted price by the quantity of this item
    // Add it to the running total ($carry)
    $carry += $priceAfterDiscount * $item['quantity'];

    // Return the updated running total so the next item can add to it
    return $carry;

}, 0); // Start the running total at 0

// Print the total price of all items in the cart after applying discounts
echo "Total cart price: $total"; 
