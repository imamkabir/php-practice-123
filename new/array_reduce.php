<?php
$cart = [
    ['name' => 'Laptop', 'price' => 1500, 'quantity' => 2, 'discount' => 0.1], // 10% off
    ['name' => 'Mouse',  'price' => 50,   'quantity' => 3, 'discount' => 0],   // no discount
    ['name' => 'Keyboard', 'price' => 100, 'quantity' => 1, 'discount' => 0.2], // 20% off
];
$total = array_reduce($cart, function($carry, $item) {
    $priceAfterDiscount = $item['price'] * (1 - $item['discount']);
    $carry += $priceAfterDiscount * $item['quantity'];
    return $carry;
}, 0);

echo "Total cart price: $total"; 
