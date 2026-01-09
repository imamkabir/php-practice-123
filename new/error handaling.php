<?php
// Error Handling Example
trigger_error("This is a user error ", E_USER_WARNING);
echo 1;




// we have  error hand;ing in php
// there are 4 types of error handaling in php
// engine error 

error_reporting(E_ALL); // Set error reporting to report all errors
// what it dose  configures which errors are reported
// controls which errors are shown or logged
// E_ALL - Report all errors and warnings
// E_ERROR - Fatal run-time errors
// E_WARNING - Run-time warnings (non-fatal errors)
// E_NOTICE - Run-time notices (these are warnings about code that could cause problems)
// E_STRICT - Run-time notices about code that will not be compatible with future versions of PHP
// E_DEPRECATED - Run-time notices about deprecated code
// E_USER_ERROR - User-generated error messages
// E_USER_WARNING - User-generated warning messages
// E_USER_NOTICE - User-generated notice messages
// E_COMPILE_ERROR - Fatal compile-time errors
// E_COMPILE_WARNING - Compile-time warnings (non-fatal errors)
// E_PARSE - Compile-time parse errors      
//  for the record  we can set error reporting in php.ini file also
// ini_set('error_reporting', E_ALL); // Set error reporting to report all errors   
// Example: Triggering different types of errors
// trigger_error("This is a user error ", E_USER_WARNING);
// trigger_error("This is a user notice", E_USER_NOTICE);
// trigger_error("This is a user warning", E_USER_WARNING);
// trigger_error("This is a user error", E_USER_ERROR);     
// Custom Error Handler
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "<b>Error:</b> [$errno] $errstr - $errfile:$errline\n";
    // You can log errors to a file or database here
    // For example: error_log("[$errno] $errstr - $errfile:$errline", 3, "errors.log");
};      
// this is so i dont forget 