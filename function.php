<?php
function loginAttempt() {
    static $attempts = 0;
    $attempts++;
    return $attempts;
}
// if the function is callable, proceed to get attempts and print message
// if not do nothing
if (is_callable('loginAttempt')) {
    $attempts = loginAttempt();
// Using match expression to determine the message based on attempts
    $message = match ($attempts) {
        1, 2, 3 => "Login attempt $attempts: Failed\n",
        default => "Too many attempts!\n",
    };

    echo $message;
}
