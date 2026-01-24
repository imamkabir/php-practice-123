<?php
$balance = 0;
$withdraw = 500;

try {
    //  THE DANGER ZONE 

    // 1. Check for the problem
    if ($withdraw > $balance) {
        // 2. THROW the bomb! (Stop everything immediately)
        throw new Exception("You are broke, my friend.");
    }

    // 3. This line acts as if nothing happened (Only runs if NO error)
    echo "Withdrawal Successful! Here is your money.";

} catch (Exception $e) {
    // --- THE SAFETY NET ---
    
    // 4. We land here safely. Use $e to get the message.
    // mind you usinng e->getmessage will reveal the error message to a real user imagine showing that the ero happend cause of insufficient funds in row 7 of youre database yeah that would be bad
    // so when in development mode its fine to show the error message but in production mode log it to a file instead and show a generic message to the user
    // like "An error occurred. Please try again later."
    // peace out imam 
    echo "Error: " . $e->getMessage(); 
}

// 5. The script continues running smoothly...
echo "\nThank you for banking with us.";