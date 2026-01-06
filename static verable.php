<?php
// Function to simulate login attempts with static variable and match expression
function loginAttempt() 
{
    // Using static variable to keep track of attempts so we dont lose count on each function call
    static $attempts = 0;
    $attempts++;
// Simulate processing time
    sleep(1);
// Using match expression to handle different attempt cases instead of multiple if-else
    match ($attempts) { // PHP 8 match expression
        1, 2, 3 => print("Login attempt $attempts: Failed\n"),
        default => print("Too many attempts!\n"),
    };
}
// Simulating multiple login attempts
loginAttempt();
loginAttempt();
loginAttempt();
loginAttempt();
