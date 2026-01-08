<?php
// $prices = [100, 200, 300];   
// array_map(function($p) {
$withTax = array_map(fn($p) => $p * 1.1, $prices);
// [110, 220, 330]




// array_filter() — Bouncer
// array_filter — Filters elements of an array using a callback function
$users = [
    ['name' => 'Ali', 'active' => true],
    ['name' => 'Zain', 'active' => false],
    
];

$active = array_filter($users, fn($u) => $u['active']);

// array_reduce() — Aggregator
// array_reduce — Iteratively reduces the array to a single value using a callback function
$numbers = [10, 20, 30];
$total = array_reduce($numbers, fn($sum, $n) => $sum + $n, 0);


// array_key_exists() — Security Guard
if (array_key_exists('email', $_POST)) {
    // safe
}


