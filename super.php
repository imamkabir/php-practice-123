<?php
$x = 22;
function wwe(){
    //global $x;
    $GLOBALS["x"] = "55";
$x = 50;
// $global keyword is used to access global variables inside a function
// and globals is a superglobal array that can be used to access global variables inside a function
echo $GLOBALS["x"];
}

//echo $x;    
wwe();
// I CALLED A FUNCTION TO PRINT A GLOBAL VARIABLE
// BUT INSIDE THE FUNCTION I CHANGED THE VALUE OF THE GLOBAL VARIABLE USING $GLOBALS SUPERGLOBAL ARRAY
echo $x; // prints 22 because local $x inside function does not affect global $x