<?php
$keys   = ['name', 'email', 'age'];
$values = ['Ali', 'ali@mail.com', 25];
// Combine two arrays into an associative array
$user = array_combine($keys, $values);

print_r($user);

$numbers = [1, 2, 3, 4, 5, 6];
// Filter even numbers from the array
$evens = array_filter($numbers, fn($num) => $num % 2 === 0);
print_r($evens); // [2, 4, 6]


$orders = [
    ['id' => 1, 'status' => 'shipped'],
    ['id' => 2, 'status' => 'pending'],
    ['id' => 3, 'status' => 'pending'],
    ['id' => 4, 'status' => 'delivered'],
];
// Get all pending orders
$pendingOrders = array_filter($orders, fn($order) => $order['status'] === 'pending');
print_r($pendingOrders);
