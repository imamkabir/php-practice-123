<?php
//  Define a helper function for invalid items
$invalidItemHandler = function($item) {
    return "Warning: Item '{$item['name']}' is invalid!";
};

//  Array of items in a shopping cart
$cart = [
    ['name' => 'Laptop', 'price' => 1500, 'quantity' => 2],
    ['name' => 'Mouse', 'price' => 50, 'quantity' => 3],
    ['name' => 'Keyboard', 'price' => 100, 'quantity' => 1],
    ['name' => 'Broken Item', 'price' => -20, 'quantity' => 1], // invalid
];

//  Calculate total using array_reduce
$total = array_reduce($cart, function($carry, $item) use ($invalidItemHandler) {
    if ($item['price'] < 0 || $item['quantity'] <= 0) {
        echo $invalidItemHandler($item) . "\n";
        return $carry; // skip invalid item
    }
    $carry += $item['price'] * $item['quantity'];
    return $carry;
}, 0);

//  Output the total
echo "Total cart price: $total\n";
