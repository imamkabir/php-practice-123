<?php

//  THE CUSTOM ALARM
class GradeSystemException extends Exception {}
function universitySecurityGuard($detectedError) {
    $currentTime = date("H:i:s");
    
    echo "\n--- [OFFICIAL SECURITY LOG] ---\n";
    // .getMessage() is a built-in "skill" of the error to tell us what happened
    echo "WHAT HAPPENED: " . $detectedError->getMessage() . "\n";
    echo "WHERE IT HAPPENED: Line " . $detectedError->getLine() . "\n";
    echo "-------------------------------\n";
    
    // Write it to the basement notebook
    $logMessage = "[$currentTime] " . $detectedError->getMessage() . PHP_EOL;
    file_put_contents("university_errors.txt", $logMessage, FILE_APPEND);
}

// Hook our guard into the PHP system
set_exception_handler('universitySecurityGuard');

// 3. THE MACHINE (The Logic)
class GradeCalculator {
    public function calculateAverage($totalPoints, $numberOfAssignments) {
        
        // CHECK: If there are 0 assignments, we can't do the math
        if ($numberOfAssignments <= 0) {
            // We "Throw" a clear English message
            throw new GradeSystemException("MATH ERROR: A student has zero assignments. Cannot divide by zero.");
        }

        return $totalPoints / $numberOfAssignments;
    }
}

// 4. THE EXECUTION (Running the code)
$calculatorMachine = new GradeCalculator();

echo "Starting the calculation...\n";

// This will trigger the alarm because we are passing '0'
$calculatorMachine->calculateAverage(100, 0); 

echo "This will never print.";