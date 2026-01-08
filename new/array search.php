<?php
// List of registered user emails
$registeredEmails = [
    'alice@mail.com',
    'bob@mail.com',
    'charlie@mail.com'
];
 //️ The email we want to check
$inputEmail = 'bob@mail.com';
// Search for the email in the registered list
$emailIndex = array_search($inputEmail, $registeredEmails);
//  Check if the email exists
// We use strict comparison !== false
// This is important because array_search can return 0 (first index),
// which is valid but would be treated as false with a simple if($emailIndex)
if ($emailIndex !== false) {
    // Found the email, print confirmation
    echo "User exists! Email found at index: $emailIndex\n";
} else {
    // Email not found
    echo "User not found!\n";
}


